<?php

declare(strict_types=1);

namespace Sabium\Service;

use Sabium\Service\CalculaIdade;
use PHPUnit\Framework\TestCase;

class CalculaIdadeTest extends TestCase
{
    public function testCalculaIdadeByDataNascimento()
    {
        $service = new CalculaIdade();
        $idade = $service->getIdadeByDataNascimento(new \DateTime('1997-04-10'));
        //assertEquals(retorno esperado, idade é consultado);

        $this->assertEquals(22, $idade);
    }

    public function testIdadeInteiro()
    {
        $service = new CalculaIdade();
        $idade = $service->getIdadeByDataNascimento(new \DateTime('1997-04-10'));
        $this->assertInternalType('int', $idade);
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testDataNascimentoMaiorQueHoje()
    {
        $service = new CalculaIdade();
        $service->getIdadeByDataNascimento(new \DateTime('tomorrow + 1day'));
    }
}
