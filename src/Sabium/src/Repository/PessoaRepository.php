<?php

namespace Sabium\Repository;

use Sabium\Entity\Pessoa;
use Doctrine\ORM\EntityRepository;

class PessoaRepository extends EntityRepository
{
    protected $entity = Pessoa::class;

    public function findBySituacao($id)
    {
        echo "teste";
        exit;
    }
}
