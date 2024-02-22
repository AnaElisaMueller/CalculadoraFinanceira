#Calculadora Financeira

Testes da classe ClaculadoraFinanceira

<hr>
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
        ...A informação passada não é numérica - ERRO: 0
        .A informação passada não pode ser menor que zero - ERRO: 0
        ....A informação passada não é numérica - ERRO: 0
        .A informação passada não pode ser menor que zero - ERRO: 0
        ......A informação passada não é numérica - ERRO: 0
        .A informação passada não pode ser menor que zero - ERRO: 0
        .A informação passada não não aceita outros tipos - ERRO: 0
        .                                                18 / 18 (100%)

        OK (18 tests, 18 assertions)
