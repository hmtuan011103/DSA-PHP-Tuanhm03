<?php

    function solution(int $n, array $arr) : int|string
    {
        if ($n === 1 || $n === 2) {
            return "No Equilibrium";
        }

        $leftSum = 0;
        $rightSum = 0;

        for ($i = 0; $i < $n; $i++) {
            $rightSum += $arr[$i];
        }

        for ($i = 0; $i < $n; $i++) {
            $rightSum -= $arr[$i];

            if ($leftSum === $rightSum)
                return $i;

            $leftSum += $arr[$i];
        }

        return 'No Equilibrium';

    }

    $arr = [7,2,1,5,4];
    $n = count($arr);
    echo solution($n, $arr);