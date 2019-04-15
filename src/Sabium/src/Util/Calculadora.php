<?php

declare(strict_types=1);

namespace Sabium\Util;

use InvalidArgumentException;
use Sabium\Exception\ArithmeticException;

class Calculadora
{
    public function soma($numero1, $numero2) : int
    {
        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            throw new InvalidArgumentException("Numero invalido");
        }

        return $numero1 + $numero2;
    }

    public function subtrair($numero1, $numero2) : int
    {
        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            throw new InvalidArgumentException("Numero invalido");
        }

        return $numero1 - $numero2;
    }

    public function multiplicar($numero1, $numero2)
    {
        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            throw new InvalidArgumentException("Numero invalido");
        }

        return $numero1 * $numero2;
    }

    public function dividir($numero1, $numero2)
    {
        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            throw new InvalidArgumentException("Numero invalido");
        }

        if ($numero2 == 0) {
            throw new ArithmeticException("Division by Zero");
        }

        return $numero1 / $numero2;
    }
}
