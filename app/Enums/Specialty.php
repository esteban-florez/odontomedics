<?php

namespace App\Enums;

enum Specialty: string
{
    use Enum;

    case General = 'Odontología General';
    case Endodoncia = 'Endodoncia';
    case Periodoncia = 'Periodoncia';
    case Ortodoncia = 'Ortodoncia';
    case Prostodoncia = 'Prostodoncia';
    case Cirugia = 'Cirugía Oral y Maxilofacial';
    case Estetica = 'Odontología Estética';
}
