<?php

namespace App\Enums;

enum Specialty: string
{
    case General = 'Odontología General';
    case Endodoncia = 'Endodoncia';
    case Periodoncia = 'Periodoncia';
    case Ortodoncia = 'Ortodoncia';
    case Prostodoncia = 'Prostodoncia';
    case Odontopediatria = 'Odontopediatría';
    case Cirugia = 'Cirugía Oral y Maxilofacial';
    case Patologia = 'Patología Oral';
    case Estetica = 'Odontología Estética';
}
