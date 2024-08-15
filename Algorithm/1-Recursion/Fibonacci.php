<?php

    function fib(int $n): int
    {
        if ($n === 0) {
            return 0;
        }

        if ($n === 1 || $n === 2){
            return 1;
        } else {
            return (fib($n - 1) + fib($n - 2));
        }
    }

    echo "\n";
    echo "Fibonacci: ";
    for ($i = 0; $i < 6; $i++) {
        echo fib($i) . " ";
    }

    echo "\n";