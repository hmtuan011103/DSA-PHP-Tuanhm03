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

    // Time Complexity: O(n^2)
    // Space Complexity: O(n)
    /*
    *
    * Stack:                                  fib(6)
    *                    fib(5)                                   fib(4)
    *         fib(4)              fib(3)                 fib(3)            fib(2)
    *     fib(3)  fib(2)      fib(2)  fib(1)         fib(2)  fib(1)
    * fib(2) fib(1)
    *
    *
    *                     8
    *         5                       3
    *    3         2             2        1
    *  2   1     1   1         1   1
    * 1 1
    *
    *
    *
    * 0 1 1 2 3
    */