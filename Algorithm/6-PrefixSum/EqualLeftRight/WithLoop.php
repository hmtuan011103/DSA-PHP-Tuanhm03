<?php

    function solution(int $n, array $arr) : int|string
    {
        if ($n === 1 || $n === 2) {
            return "No Equilibrium";
        }

        for ($i = 1; $i < $n - 1; $i++) {
            $leftSum = 0;
            for ($j = $i - 1; $j >= 0; $j--) {
                $leftSum += $arr[$j];
            }

            $rightSum = 0;
            for ($j = $i + 1; $j < $n; $j++) {
                $rightSum += $arr[$j];
            }

            if ($leftSum === $rightSum) {
                return $i;
            }
        }

        return 'No Equilibrium';

    }

    $arr = [7,2,1,5,4];
    $n = count($arr);
    echo solution($n, $arr);