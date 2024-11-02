<?php

namespace App\Enums;

enum Gender: string
{
    use Enum;

    case Male = 'Masculino';
    case Female = 'Femenino';
}
