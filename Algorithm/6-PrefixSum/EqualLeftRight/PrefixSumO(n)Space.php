<?php

    function solution(int $n, array $arr) : int|string
    {
        if ($n === 1 || $n === 2) {
            return "No Equilibrium";
        }

        $prefixSum = [];
        $prefixSum[] = $arr[0];

        for ($i = 1; $i < $n; $i++) {
            $prefixSum[] = $prefixSum[$i - 1] + $arr[$i];
        }

        $leftSum = 0;
        $rightSum = $prefixSum[$n - 1] - $arr[0];

        for ($i = 1; $i < $n; $i++) {

            $leftSum = $prefixSum[$i - 1];
            $rightSum -= $arr[$i];

            if ($leftSum === $rightSum)
                return $i;
        }

        return 'No Equilibrium';

    }

    $arr = [7,2,1,5,4];
    $n = count($arr);
    echo solution($n, $arr);