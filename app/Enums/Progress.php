<?php

namespace App\Enums;

enum Progress: string
{
    use Enum;

    case Active = 'En curso';
    case Finished = 'Finalizado';
}
