<?php
    function formataTelefone($numero) {
        function formataOitoDigitos($digitos){
            return implode(" ", str_split($digitos, 4));
        }

        if(mb_strlen($numero) < 8 ||  mb_strlen($numero) == 9 || mb_strlen($numero) > 11){            
            return $numero;
        } elseif (mb_strlen($numero) == 8){
            return formataOitoDigitos($numero);
        } elseif (mb_strlen($numero) == 10){
            $strDDD = "(" . mb_substr($numero, 0, 2) . ")";
            $strNumero = formataOitoDigitos(mb_substr($numero, 2));
            return $strDDD . " " . $strNumero;
        }elseif (mb_strlen($numero) == 11){
            if(mb_substr($numero, 0, 4) != "0800" && mb_substr($numero, 0, 4) != "0300"){
                return $numero;
            }
            return mb_substr($numero, 0, 4) . " " . mb_substr($numero, 4, 3) . " " . mb_substr($numero, 7);
        }
    }

    function listaTelefonica(){

    }
    
    echo formataTelefone("03007024000");
?>