<?php
    function formataNumero($numero){
        if(mb_strlen($numero) < 10 || mb_strlen($numero) > 11 || !is_numeric($numero)){
            return "Test";
        }

        if(mb_strlen($numero) == 10){
            return "(" . mb_substr($numero, 0, 2) . ") " . mb_substr($numero, 2, 4) . "-" . mb_substr($numero, 6);
        } elseif (mb_strlen($numero) == 11){
            return "(" . mb_substr($numero, 0, 2) . ") " . mb_substr($numero, 2, 5) . "-" . mb_substr($numero, 7);
        }
    }

    echo formataNumero("22925271727");
?>