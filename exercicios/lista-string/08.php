<?php
    function removerPontuacao($texto){
        $symbols = [",", "-", ";", ":", "!", "?", " "];
        return str_replace($symbols, "", $texto);
    }

    // echo removerPontuacao("Olá, tudo bem?");
?>