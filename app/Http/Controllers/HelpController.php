<?php

namespace App\Http\Controllers;

use App\Models\Video;

class HelpController extends Controller
{
    public array $videos;

    public function __construct() {
       $this->videos = [
            new Video('registrar-usuario', 'Registrar usuario', 'Aquí te enseñaremos como registra un usuario con su correo y contraseña dentro de la aplicación Odontomedics.'),
            new Video('iniciar-sesion', 'Iniciar sesión', 'Para acceder a las funcionalidades de la aplicación, debes iniciar sesión usando tu correo y contraseña.'),
            new Video('agendar-cita', 'Agendar una cita', 'Aprenderás a agendar una cita mediante nuestra plataforma web, desde la comodidad de tu hogar.'),
            new Video('asignar-doctor', 'Asignar doctor a una cita', 'Para el proceso de citas, debes asignar un doctor a las mismas. En este video aprenderás como hacerlo.'),
            new Video('cancelar-cita', 'Cancelar citas', '¿Ocurrió algún percance? No te preocupes, puedes cancelar tu cita por nuestra plataforma web en cualquier momento.'),
            new Video('añadir-tratamiento', 'Añadir tratamiento', 'En este video podrás aprender mediante una serie de pasos a como añadir un tratamiento a tus pacientes.'),
            new Video('registrar-insumo', 'Registrar un insumo', 'Para llevar el control de tu inventario, en este tutorial podrás aprender a registrar insumos médicos dentro de la aplicación.'),
            new Video('registrar-paciente', 'Registrar a un paciente', 'Para llevar a cabo el control del historial médico y agendar citas, debes registrar los pacientes en a aplicación.')
        ];
    }

    public function index() {
        return view('help.index', [
            'videos' => $this->videos,
        ]);
    }

    public function show($slug) {
        $video = collect($this->videos)->first(fn($video) => $video->slug === $slug);

        abort_if(!$video, 404);

        return view('help.show', [
            'video' => $video,
        ]);
    }
}
