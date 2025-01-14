<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use stdClass;

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
        $monthly = new stdClass;
        $yearly = new stdClass;

        $monthly->rows = DB::table('bills')
            ->selectRaw('SUM(`total`) as income, MIN(`created_at`) as `date`')
            ->where('created_at', '>=', $this->yearAgo())
            ->groupByRaw('CONCAT(YEAR(`created_at`), MONTH(`created_at`))')
            ->orderBy('date')
            ->get();

        $monthly->total = 0;
        $monthly->rows = $monthly->rows->map(function ($row) use ($monthly) {
            $monthly->total += $row->income;
            $row->date = $this->date($row->date);
            $row->income = $this->currency($row->income);
            return $row;
        });

        $yearly->rows = DB::table('bills')
            ->selectRaw('SUM(`total`) as income, YEAR(`created_at`) as `date`')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $yearly->total = 0;
        $yearly->rows = $yearly->rows->map(function ($row) use ($yearly) {
            $yearly->total += $row->income;
            $row->income = $this->currency($row->income);
            return $row;
        });

        $monthly->total = $this->currency($monthly->total);
        $yearly->total = $this->currency($yearly->total);

        return $this->loadPDF('incomes', [
            'monthly' => $monthly,
            'yearly' => $yearly,
        ]);
    }

    public function active()
    {

    }

    public function monthly()
    {
        $data = new stdClass;

        $data->rows = DB::table('appointments')
            ->selectRaw('COUNT(`id`) as `count`, MIN(`created_at`) as `date`')
            ->where('created_at', '>=', $this->yearAgo())
            ->groupByRaw('CONCAT(YEAR(`created_at`), MONTH(`created_at`))')
            ->orderBy('date')
            ->get();

        $data->total = 0;
        $data->rows = $data->rows->map(function ($row) use ($data) {
            $data->total += $row->count;
            $row->date = $this->date($row->date);
            return $row;
        });

        return $this->loadPDF('monthly-appointments', [
            'data' => $data,
        ]);
    }

    public function treatments()
    {

    }

    public function stock()
    {
        $products = Product::stock()
            ->orderBy('products.created_at', 'DESC')
            ->get();

        return $this->loadPDF('stock', [
            'products' => $products,
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

    private function currency(string|float|int $income)
    {
        $number = (float) $income / 100;
        $formatted = Number::format($number, precision: 2, locale: 'es');
        return "$formatted $";
    }

    private function date(string $datestr)
    {
        $date = Carbon::parse($datestr);
        $month = ucfirst($date->locale('es')->monthName);
        return "$month ($date->year)";
    }

    private function yearAgo()
    {
        return now()->subYear()->addMonth()
            ->setDay(1)->setTime(0, 0, 0, 0);
    }
}
