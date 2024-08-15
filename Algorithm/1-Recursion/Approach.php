<?php

    function approach($number): int
    {
        $total = 0;
        for($i = $number; $i > 0; $i--) {
            $total += $i;
        }
        return $total;
    }

    function approachRecursion($number): int
    {
        if ($number === 1) {
            return 1;
        } else {
            return $number + approachRecursion($number - 1);
        }
    }

    echo "\n";
    echo "Approach Loop: ";
    echo(approach(5));
    echo "\n";

    echo "\n";
    echo "Approach Recursion: ";
    echo(approachRecursion(5));
    echo "\n";

    /*
    *  This is the order the stack is added from left to right
    *  Stack: approachRecursion(5), approachRecursion(4), approachRecursion(3),
    *  approachRecursion(2), approachRecursion(1)
    */

    /*
    * This is a representation of the slow running of adding nodes to the stack one by one.
    *
    * 5 + approachRecursion(4)
    * ( 5 + approachRecursion(4) ) + approachRecursion(3)
    * ( ( 5 + approachRecursion(4) ) + approachRecursion(3) ) + approachRecursion(2)
    * ( ( ( 5 + approachRecursion(4) ) + approachRecursion(3) ) + approachRecursion(2) ) + approachRecursion(1)
    */


    /*
    * This is a representation of the process running slowly as nodes are removed from the stack one by one.
    *
    * ( ( ( 5 + approachRecursion(4) ) + approachRecursion(3) ) + approachRecursion(2) ) + 1
    * ( ( ( 5 + approachRecursion(4) ) + approachRecursion(3) ) + 2 ) + 1
    * ( ( ( 5 + approachRecursion(4) ) + 3 ) + 2 ) + 1
    * ( ( ( 5 + 4 ) + 3 ) + 2 ) + 1
    * 15
    */