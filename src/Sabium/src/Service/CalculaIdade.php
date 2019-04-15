<?php

namespace Sabium\Service;

use InvalidArgumentException;

class CalculaIdade
{
    public function getIdadeByDataNascimento(\DateTime $datanascimento) : int
    {
        $dataHoje = new \DateTime();

        if ($datanascimento > $dataHoje) {
            throw new InvalidArgumentException("Data invalida");
        }

        return $dataHoje->diff($datanascimento)->y;
    }
}
