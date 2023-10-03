<?php
    function formataTelefone($telefone){
        if(! is_numeric($telefone) || mb_strlen($telefone) < 8 || mb_strlen($telefone) > 11 || mb_strlen($telefone) === 9){
            return $telefone;
        }

        if(mb_strlen($telefone) === 8) {
            return mb_substr($telefone, 0, 4) . " " . mb_substr($telefone, 4);
        } elseif(mb_strlen($telefone) === 10) {
            return "(" . mb_substr($telefone, 0, 2) . ") ". mb_substr($telefone, 2, 4) . "-" . mb_substr($telefone, 6);
        } elseif(mb_strlen($telefone) === 11) {
            if(mb_substr($telefone, 0, 4) === "0800" || mb_substr($telefone, 0, 4) === "0300"){
                return mb_substr($telefone, 0, 4) . " " . mb_substr($telefone, 4, 3) . " " . mb_substr($telefone, 7);
            } else {
                return "(" . mb_substr($telefone, 0, 2) . ") " . mb_substr($telefone, 2, 1) . "-" . mb_substr($telefone, 3, 4) . "-" . mb_substr($telefone, 7);
            }
        }
    }

    // echo formataTelefone("22987654321");
?>