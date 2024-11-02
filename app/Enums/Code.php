<?php

namespace App\Enums;

enum Code: string
{
    use Enum;

    case Digitel = '0412';
    case Movistar1 = '0414';
    case Movistar2 = '0424';
    case Movilnet1 = '0416';
    case Movilnet2 = '0426';
}
