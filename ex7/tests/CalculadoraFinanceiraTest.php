<?php

use PHPUnit\Framework\TestCase;

require_once 'src/CalculadoraFinanceira.php';

class CalculadoraFinanceiraTest extends TestCase
{
    /*
    Teste para verificar o correto calculo dos métodos somar e subtrair.
    
    **Testes principais:
        *Calcular Juros Simples
        *Calcular Juros Compostos
        *Calcular Amortização

    Para cada teste principal, há os seguintes testes:

                  Nome               ||   quantidade por teste principipal
        *Certo                       ||          1,    1,    2
        *Extremo                     ||          1,    1,    2   
        *Zero                        ||          1,    1,    1  
        *String                      ||          1,    1,    1
        *Negativo                    ||          1,    1,    1
        *TipoIncorreto               ||          0,    0,    1
        
    **Exceptions:
        *Message
        *Code

    **Resultado de teste:
        .A informação passada não é numérica - ERRO: 0
        .A informação passada não pode ser menor que zero - ERRO: 0
        ..A informação passada não é numérica - ERRO: 0
        .A informação passada não pode ser menor que zero - ERRO: 0
        ...A informação passada não é numérica - ERRO: 0
        .A informação passada não pode ser menor que zero - ERRO: 0
        .A informação passada não não aceita outros tipos - ERRO: 0
        .                                                       11 / 11 (100%)

        OK (18 tests, 18 assertions)
    */

    #Testar Calcular Juros Simples (calcularJurosSimples)
    public function testCalcularJurosSimples()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosSimples = $classeCalculadoraFinanceira->calcularJurosSimples(1, 0.05, 3);

        $this->assertEquals(0.15, $jurosSimples);
    }

    public function testCalcularJurosSimplesExtremo()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosSimples = $classeCalculadoraFinanceira->calcularJurosSimples(1700007.1111, 0.05, 22);

        $this->assertEquals(1870007.82, $jurosSimples);
    }

    public function testCalcularJurosSimplesZero()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosSimples = $classeCalculadoraFinanceira->calcularJurosSimples(0, 0.05, 3);

        $this->assertEquals(0, $jurosSimples);
    }

    public function testCalcularJurosSimplesString()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosSimples = $classeCalculadoraFinanceira->calcularJurosSimples('a', 2, 3);

        $this->assertEquals(0, $jurosSimples);
    }

    public function testCalcularJurosSimplesNegativo()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosSimples = $classeCalculadoraFinanceira->calcularJurosSimples(-1, -2, 3);

        $this->assertEquals(0, $jurosSimples);
    }



    #Testar Calcular Juros Compostos (calcularJurosCompostos)
    public function testCalcularJurosCompostos() 
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosCompostos = $classeCalculadoraFinanceira->calcularJurosCompostos(1000, 0.08, 5);

        $this->assertEquals(469.33, $jurosCompostos);
    }

    public function testCalcularJurosCompostosExtremo()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosCompostos = $classeCalculadoraFinanceira->calcularJurosSimples(1700007.1111, 0.05, 22);
  
        $this->assertEquals( 1870007.82, $jurosCompostos);
    }

    public function testCalcularJurosCompostosZero()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosCompostos = $classeCalculadoraFinanceira->calcularJurosCompostos(0, 0.05, 3);

        $this->assertEquals(0, $jurosCompostos);
    }

    public function testCalcularJurosCompostosString()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosCompostos = $classeCalculadoraFinanceira->calcularJurosCompostos('a', 2, 3);

        $this->assertEquals(0, $jurosCompostos);
    }

    public function testCalcularJurosCompostosNegativo()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $jurosCompostos = $classeCalculadoraFinanceira->calcularJurosCompostos(-1, -2, 3);

        $this->assertEquals(0, $jurosCompostos);
    }

    #Testar Calcular Amortização (calcularAmortizacao)
    public function testCalcularAmortizacaoSac() 
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao(20000, 0.05, 10, "SAC");

        $this->assertEquals([5500.0, 18000.0, 16000.0, 14000.0, 12000.0, 10000.0, 8000.0, 6000.0, 4000.0, 2000.0, 0.0], $amortizacao);
    }

    public function testCalcularAmortizacaoPrice() 
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao(20000, 0.04, 8, "Price");

        $this->assertEquals([3764.45, 17829.44, 15572.06, 13224.39, 10782.81, 8243.57, 5602.75, 2856.3, 0], $amortizacao);
    }

    public function testCalcularAmortizacaoExtremoSAC()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao(80000000.1111, 0.04, 5, "SAC");

        $this->assertEquals([9600000.01, 64000000.09, 48000000.07, 32000000.04, 16000000.02, 0.0], $amortizacao);
    }

    public function testCalcularAmortizacaoZeroSAC()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao(0, 0.04, 5, "SAC");

        $this->assertEquals([], $amortizacao);
    }

    public function testCalcularAmortizacaoExtremoPrice()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao(80000000, 0.05, 5, "Price");

        $this->assertEquals([12389919.25, 65522016.15, 50320133.11, 34358155.91, 17598079.86, 0.0], $amortizacao);
    }

    public function testCalcularAmortizacaoString()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao('a', 2, 3, "Price");

        $this->assertEquals(0, $amortizacao);
    }

    public function testCalcularAmortizacaoNegativo()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao(-1, -2, 3, "Price");

        $this->assertEquals(0, $amortizacao);
    }

    public function testCalcularAmortizacaoTipo()
    {

        $classeCalculadoraFinanceira = new CalculadoraFinanceira;
        $amortizacao = $classeCalculadoraFinanceira->calcularAmortizacao(1, 2, 3, "NENHUM");

        $this->assertEquals(0, $amortizacao);
    }
}
