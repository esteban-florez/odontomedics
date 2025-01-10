<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\App;

class PDFController extends Controller
{
    public function appointments()
    {
        return $this->loadPDF([
            'appointments' => Appointment::forUser()->get()
        ]);
    }

    public function doctors()
    {
        return $this->loadPDF([
            'doctors' => Doctor::latest()->get(),
        ]);
    }

    public function patients()
    {
        return $this->loadPDF([
            'patients' => Patient::latest()->get(),
        ]);
    }

    private function loadPDF($data)
    {
        $image = base64_encode(file_get_contents(public_path('img/logo.png')));
        $data['image'] = $image;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdfs.patients', $data);

        return $pdf->stream();
    }
}
