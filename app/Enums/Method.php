<?php

namespace App\Enums;

enum Method: string
{
    use Enum;

    case Efectivo = 'Efectivo';
    case PagoMovil = 'Pago Móvil';
    case Transferencia = 'Transferencia';
}
