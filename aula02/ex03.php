<?php
// Crie uma função dataPorExtenso que receba uma data no
// formato "dd/mm/aaaa" e retorne a data com o mês por
// extenso, no formato "dd de mês de aaaa", ex.:
// '17/08/2023' deve retornar '17 de Agosto de 2023'

function dataPorExtenso($data)
{
    $meses = [
        1 => "Janeiro",
        "Fevereiro",
        "Marco",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
    ];

    $arrayData = explode("/", $data);
    $dia = $arrayData[0];
    // $mes = str_split($arrayData[1])[1];
    $mes = (int) $arrayData[1];
    $ano = $arrayData[2];
    echo $dia, " de ", $meses[$mes], " de ", $ano;
}

echo dataPorExtenso("16/03/1996");
