<?php

class CalculadoraFinanceira
{
    public $jurosSimples = 0;
    public $jurosCompostos = 0;
    public $amortizacao = [];

    public function calcularJurosSimples($capital, $taxa, $tempo)
    {
        try {
            if (!isset($capital, $taxa, $tempo)) {
                throw new Exception("A informação passada não foi definida");
            }

            if (!is_numeric($capital) || !is_numeric($taxa) || !is_numeric($tempo)) {
                throw new Exception("A informação passada não é numérica");
            }

            if ($capital < 0 || $taxa < 0 || $tempo < 0) {
                throw new Exception("A informação passada não pode ser menor que zero");
            }

            if (isset($capital, $taxa, $tempo) && is_numeric($capital) && $capital >= 0 && is_numeric($taxa) && $taxa >= 0 && is_numeric($tempo) && $tempo >= 0) {
                $this->jurosSimples = $capital * $taxa * $tempo;
            }
            return round($this->jurosSimples, 2);
        } catch (Exception $e) {
            print_r($e->getMessage());
            echo " - ";
            echo "ERRO: ";
            print_r($e->getCode());
            echo "\n";
        }
    }

    public function calcularJurosCompostos($capital, $taxa, $tempo)
    {
        try {
            if (!isset($capital, $taxa, $tempo)) {
                throw new Exception("A informação passada não foi definida");
            }

            if (!is_numeric($capital) || !is_numeric($taxa) || !is_numeric($tempo)) {
                throw new Exception("A informação passada não é numérica");
            }

            if ($capital < 0 || $taxa < 0 || $tempo < 0) {
                throw new Exception("A informação passada não pode ser menor que zero");
            }

            if (isset($capital, $taxa, $tempo) && is_numeric($capital) && $capital >= 0 && is_numeric($taxa) && $taxa >= 0 && is_numeric($tempo) && $tempo >= 0) {
                $montante = pow((1 + $taxa), $tempo) * $capital;
                $this->jurosCompostos = $montante - $capital;
                
            }
            return round($this->jurosCompostos, 2);
        } catch (Exception $e) {
            print_r($e->getMessage());
            echo " - ";
            echo "ERRO: ";
            print_r($e->getCode());
            echo "\n";
        }
    }

    public function calcularAmortizacao($capital, $taxa, $tempo, $tipo)
    {
        try {
            if (!isset($capital, $taxa, $tempo)) {
                throw new Exception("A informação passada não foi definida");
            }

            if (!is_numeric($capital) || !is_numeric($taxa) || !is_numeric($tempo)) {
                throw new Exception("A informação passada não é numérica");
            }

            if ($capital < 0 || $taxa < 0 || $tempo < 0) {
                throw new Exception("A informação passada não pode ser menor que zero");
            }

            if ($tipo !== "SAC" && $tipo !== "Price") {
                throw new Exception("A informação passada não não aceita outros tipos");
            }

            if (isset($capital, $taxa, $tempo) && is_numeric($capital) && $capital > 0 && is_numeric($taxa) && $taxa >= 0 && is_numeric($tempo) && $tempo >= 0.1) {

                if ($tipo === "SAC") {

                    $arraySaldoDevedor = [];
                    $totalJurosSAC = 0;
                    $saldoDevedor = 0;

                    $amortizacao = $capital / $tempo; 
                    $saldoDevedor = $capital;

                    for ($linha = 1; $linha <= $tempo; $linha++) {
                        $jurosSAC = $saldoDevedor * $taxa;
                        $totalJurosSAC += $jurosSAC;
                        $saldoDevedor = $saldoDevedor - $amortizacao;
                        $arraySaldoDevedor[$linha] = $saldoDevedor;
                    }

                    $this->amortizacao[] = round($totalJurosSAC, 2);

                    for ($linha = 1; $linha <= $tempo; $linha++) {
                        $this->amortizacao[] = round($arraySaldoDevedor[$linha], 2);
                    }
                }

                if ($tipo === "Price") {

                    $saldoDevedor = 0;
                    $totalJurosPrice = 0;
                    $arraySaldoDevedor = []; 

                    $parcela = $capital * ((pow((1 + $taxa), $tempo) * $taxa) / (-1 + pow(1 + $taxa, $tempo)));
                    $saldoDevedor = $capital;

                    for ($linha = 1; $linha <= $tempo; $linha++) {

                        $jurosPrice = $saldoDevedor * $taxa;
                        $totalJurosPrice += $jurosPrice;
                        $amortizacaoPrice = $parcela - $jurosPrice;
                        $saldoDevedor = $saldoDevedor - $amortizacaoPrice;
                        $arraySaldoDevedor[$linha] = $saldoDevedor;
                    }

                    $this->amortizacao[] = round($totalJurosPrice, 2);

                    for ($linha = 1; $linha <= $tempo; $linha++) {
                        $this->amortizacao[] = round($arraySaldoDevedor[$linha], 2);
                    }
                }
            }

            return $this->amortizacao; //array =[total de juros pagos, valor das parcelas];

        } catch (Exception $e) {
            print_r($e->getMessage());
            echo " - ";
            echo "ERRO: ";
            print_r($e->getCode());
            echo "\n";
        }
    }
}
