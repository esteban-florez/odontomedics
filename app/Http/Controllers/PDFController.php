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
            ->groupByRaw('CONCAT(YEAR(`created_at`), MONTH(`created_at`))')
            ->orderBy('date')
            ->get();

        $monthly->total = 0;
        $monthly->rows = $monthly->rows->map(function ($row) use ($monthly) {
            $monthly->total += $row->income;
            $date = Carbon::parse($row->date);

            $income = (int) $row->income / 100;
            $month = ucfirst($date->locale('es')->monthName);

            $row->date = "$month ($date->year)";
            $row->income = $this->currency($income);
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
            $income = (int) $row->income / 100;
            $row->income = $this->currency($income);
            return $row;
        });

        $monthly->total = $this->currency($monthly->total / 100);
        $yearly->total = $this->currency($yearly->total / 100);

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

    private function currency(float|int $number)
    {
        $formatted = Number::format($number / 1000, precision: 2, locale: 'es');
        return "$formatted $";
    }
}
