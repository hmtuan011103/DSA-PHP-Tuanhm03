<?php

    function printFun($test): void
    {
        if ($test > 0) {
            echo "$test ";
            printFun($test - 1);
            echo "$test ";
        }
    }

    echo "\n";
    echo "Example: ";
    printFun(3);
    echo "\n";

    /*
     * Stack: printFun(3), printFun(2), printFun(1), printFun(0)
     *
     *
     * Pop From Right To Left
     * printFun(0) is top stack, Pop to top with FILO
     *
     * Drop Stack printFun(0) is not print
     * Drop Stack printFun(1) is print 1
     * Drop Stack printFun(1) is print 2
     * Drop Stack printFun(1) is print 3
     *
     *
     * print: 3 2 1 1 2 3
     */

