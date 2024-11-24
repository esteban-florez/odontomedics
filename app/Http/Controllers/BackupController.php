<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class BackupController extends Controller
{
    // protected $dump_path = "C:/laragon/bin/mysql/mysql-8.0.30-winx64/bin/mysqldump";
    protected $destination_path = '';
    protected $appname;

    public function __construct()
    {
        $this->destination_path = base_path('storage/app/public/backups');
        $this->appname = env('APP_NAME', 'Laravel');
    }

    public function get_size($size)
    {
        $units = [
            'GB' => 1 << 30,
            'MB' => 1 << 20,
            'KB' => 1 << 10,
        ];

        foreach ($units as $unit => $value) {
            if ($size >= $value) {
                return number_format($size / $value, 2) . $unit;
            }
        }

        return number_format($size, 2) . " B";
    }

    public function index()
    {
        $path = storage_path("app/{$this->appname}");
        File::ensureDirectoryExists($path);
        $files = collect(File::files($path));

        $backups = [];

        foreach ($files as $key => $file) {
            $date = explode('.', $file->getBasename())[0];

            $backups[$key] = [
                'index' => ++$key,
                'key' => $file->getBasename(),
                'size' => $this->get_size($file->getSize()),
                'date' => Carbon::createFromFormat('Y-m-d-H-i-s', $date)->format('d/m/Y - h:i a'),
            ];
        }

        return view('backups.index', [
            'backups' => $backups
        ]);
    }

    public function create()
    {
        $base = base_path();
        shell_exec("cd {$base} && php artisan backup:run  --only-db");

        return to_route('backups.index')
            ->with('alert', 'El respaldo se ha registrado correctamente.');
    }

    public function delete($record)
    {
        $file_name = "/{$this->appname}/" . $record;
        $disk = Storage::disk(config('laravel.backup.backup.destination.disks'));

        if ($disk->exists($file_name)) {
            $disk->delete($file_name);

            return to_route('backups.index')
                ->with('alert', 'El respaldo ha sido borrado correctamente');
        } else {
            return to_route('backups.index')
                ->with('alert', 'No se encontró el respaldo a borrar');
        }
    }

    public function download($record)
    {
        $file_name = "/{$this->appname}/" . $record;
        $disk = Storage::disk(config('laravel.backup.backup.destination.disks'));

        if ($disk->exists($file_name)) {
            $stream = $disk->readStream($file_name);
            $download_file_name = explode('/', $file_name)[2];

            return Response::stream(function () use ($stream) {
                fpassthru($stream);
                fclose($stream);
            }, 200, [
                'Content-Type' => $disk->mimeType($file_name),
                'Content-Length' => $disk->size($file_name),
                'Content-disposition' => "attachment; filename={$download_file_name}",
            ]);
        } else {
            return 'El respaldo que intenta descargar no existe, pruebe creando una copia de seguridad u otro respaldo';
        }
    }

    public function restore($record)
    {
        $file_name = "/{$this->appname}/" . $record;
        $disk = Storage::disk(config('laravel.backup.backup.destination.disks'));
        $file = $disk->readStream($file_name);

        $tempDir = storage_path('app/backup-temp');

        $zip = new ZipArchive();
        if ($zip->open(stream_get_meta_data($file)['uri'])) {
            $zip->extractTo($tempDir);
        }

        $sql = File::get(
            storage_path('app/backup-temp/db-dumps/mysql-odontomedics.sql')
        );

        Artisan::call('db:wipe');
        DB::unprepared($sql);
        File::cleanDirectory($tempDir);

        return to_route('backups.index')
            ->with('alert', 'La restauración se ejecutó correctamente');
    }
}
