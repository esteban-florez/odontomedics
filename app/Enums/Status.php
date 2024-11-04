<?php

namespace App\Enums;

enum Status: string
{
    use Enum;

    case Pending = 'En Espera';
    case Canceled = 'Cancelada';
    case Approved = 'Aprobada';
    case Completed = 'Completada';
}
