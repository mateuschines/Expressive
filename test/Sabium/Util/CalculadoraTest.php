<?php

declare(strict_types=1);

namespace Sabium\Util;

use Sabium\Util\Calculadora;
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase
{
    protected $calculadora;

    protected function setUp()
    {
        $this->calculadora = new Calculadora();
    }

    public function testSomaCindoMaisCindoGeraDez()
    {
        $calculadora = new Calculadora();
        $soma = $calculadora->soma(5, 5);
        //assertEquals(retorno esperado, idade é consultado);

        $this->assertEquals(10, $soma);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSomaComArgumentosInvalidos()
    {
        $calculadora = new Calculadora();
        $calculadora->soma(null, 'a');
    }

    public function testSomaNumeroNegativo()
    {
        $calculadora = new Calculadora();
        $soma = $calculadora->soma(-1, 5);
        $this->assertEquals(4, $soma);
    }
    public function testSubtracaoDezComDez()
    {
        $calculadora = new Calculadora();
        $resultado = $calculadora->subtrair(10, 10);
        $this->assertEquals(0, $resultado);
    }

    public function testMultiplicacaoDezComDez()
    {
        $resultado = $this->calculadora->multiplicar(10, 10);
        $this->assertEquals(100, $resultado);
    }

    public function testDivisaoDezComDez()
    {
        $resultado = $this->calculadora->dividir(100, 10);
        $this->assertEquals(10, $resultado);
    }

    /**
     * @expectedException \Sabium\Exception\ArithmeticException
     * @expectedExceptionMessage Division by Zero
     */
    public function testDivisaoByZero()
    {
        $resultado = $this->calculadora->dividir(100, 0);
    }

    public function testDividirZeroPorCem()
    {
        $resultado = $this->calculadora->dividir(0, 100);
        $this->assertEquals(0, $resultado);
    }
}
