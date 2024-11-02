<?php

namespace App\Enums;

enum Diagnosis: string
{
    use Enum;

    case Caries = 'Caries Dental';
    case Gingivitis = 'Gingivitis';
    case Periodontitis = 'Periodontitis';
    case Halitosis = 'Halitosis';
    case Traumatismo = 'Traumatismos Dentales';
    case Sensibilidad = 'Sensibilidad Dental';
}
