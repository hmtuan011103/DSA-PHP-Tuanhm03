<?php

    function factorial(int $n): int
    {
        if ($n === 0 || $n === 1){
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }

    /*
     *
     * Stack: factorial(4), factorial(3), factorial(2), factorial(1)
     *
     *
     * Stack:   factorial(4)
     *        4 * factorial(3)
     *            3 * factorial(2)
     *                2 * factorial(1)
     *
     *      4 * (3 * (2 * 1))
     *           3 * (2 * 1)
     *                2 * 1
     *
     * 4 * factorial(3)
     * (4 * factorial(3)) * factorial(2)
     * ((4 * factorial(3)) * factorial(2)) * factorial(1)
     *
     *
     * ((4 * factorial(3)) * factorial(2)) * factorial(1)
     * ((4 * factorial(3)) * factorial(2)) * 1
     * ((4 * factorial(3)) * 2) * 1
     * ((4 * 3) * 2) * 1
     */

    echo "\n";
    echo "Factorial: ";
    echo factorial(4);
    echo "\n";
