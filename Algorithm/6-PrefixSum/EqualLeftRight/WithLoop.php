<?php

    /*
        Problem Statement: Given an array of n integers, find if any index exists such that the sum of elements to its right is equal to the sum of elements to its left. If yes print the index, otherwise print “No Equilibrium”.

        Example 1:
        Input: N = 5, array[] = {7,2,1,5,4}
        Output: 2
        Explanation: Sum of elements to the left of index 2 is 7+2=9 and to the right of index 2 is 5+4=9.

        Example 2:
        Input:  N=4, array[]={23,32,12,4}
        Output: No Equilibrium
        Explanation: No such index exists for which the sum to its right and left is equal
     */

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