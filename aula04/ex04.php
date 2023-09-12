<?php
// Faça uma função "emailValido" que receba um e-mail e
// retorne true caso: (i) O e-mail contiver arroba (@);
// (ii) Arroba não for o último, nem o primeiro caractere;
// (iii) Há um ponto após o arroba, mas esse não deve
// ser o último caractere, nem o caractere seguinte ao arroba;
// (iv) O e-mail possui até 100 caracteres.

    function emailValido($email){
        if(strlen($email) >= 100){
            return false; 
        }

        $atPos = strpos($email, "@");
        if($atPos && $atPos != 0 && $atPos != mb_strlen($email)-1){
            $dotPos = strpos($email, ".", strpos($email, "@"));
            if($dotPos && $dotPos != $atPos+1 && $dotPos != mb_strlen($email)-1){                
                return true;
            } else {
                return false;
            }
        }else {
            return false;
        }

    }

    echo emailValido( '@teste' ) ? 'S' : 'N', PHP_EOL;
    echo emailValido( 'ateste@' ) ? 'S' : 'N', PHP_EOL;
    echo emailValido( 'teste@.oi' ) ? 'S' : 'N', PHP_EOL;
    echo emailValido( 'teste@oi.' ) ? 'S' : 'N', PHP_EOL;
    echo emailValido( 'abcd@aa.aa' . str_repeat( 'a', 91 )  ) ? 'S' : 'N', PHP_EOL;
    echo emailValido( 'abcd@aa.aa' ) ? 'S' : 'N', PHP_EOL;
?>