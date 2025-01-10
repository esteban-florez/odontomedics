<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function appointments()
    {
        return $this->loadPDF('appointments', [
            'appointments' => Appointment::forUser()->get()
        ]);
    }

    public function doctors()
    {
        return $this->loadPDF('doctors', [
            'doctors' => Doctor::latest()->get(),
        ]);
    }

    public function patients()
    {
        return $this->loadPDF('patients', [
            'patients' => Patient::latest()->get(),
        ]);
    }

    public function incomes()
    {
        $monthly = DB::table('bills')
            ->selectRaw('SUM(`total`) as income, MIN(`created_at`) as `date`')
            ->groupByRaw('CONCAT(YEAR(`created_at`), MONTH(`created_at`))')
            ->orderBy('date')
            ->get();

        $yearly = DB::table('bills')
            ->selectRaw('SUM(`total`), YEAR(`created_at`) as `date`')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return $this->loadPDF('incomes', [
            'monthly' => $monthly,
            'yearly' => $yearly,
        ]);
    }

    private function loadPDF($view, $data)
    {
        $image = base64_encode(file_get_contents(public_path('img/logo.png')));
        $data['image'] = $image;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView("pdfs.$view", $data);

        return $pdf->stream();
    }
}
