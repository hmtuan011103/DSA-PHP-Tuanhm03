<?php
    function solution($height, $a, $b, $c): void
    {
        if ($height === 1) {
            echo "Move disk from rod $a to rod $c \n";
        } else {
            solution($height - 1, $a, $c, $b);
            echo "Move disk from rod $a to rod $c \n";
            solution($height - 1, $b, $a, $c);
        }
    }


    $height = 3;
    solution($height, 'A','B','C');

