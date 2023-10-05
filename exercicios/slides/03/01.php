<?php
    function fibArray($valor){
        $fib = [1=>0, 1];

        if(in_array($valor, $fib)) {
            return $fib;
        } else {
            for($i = 3; $i <= $valor; $i++) {
                $pos1 = count($fib);
                $pos2 = count($fib) - 1;
                $fib []= $fib[$pos1] + $fib[$pos2];
            }
        }

        return $fib;
    }

    print_r(fibArray(rand(0,100)));
?>