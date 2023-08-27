<?php
   
    // Exercício 01 - Fatorial
   function calculaFatorial($valor){
        if($valor<0){
            return -1;
        } else if ($valor == 0) {
            return 1;
        } else {
            return ($valor * calculaFatorial($valor - 1));
        }
        
   }

   for($i = 1; $i <= 30; $i++){
       echo "Fatorial de $i = ", calculaFatorial($i), "\n";
   }
?>