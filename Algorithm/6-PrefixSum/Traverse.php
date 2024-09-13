<?php

    function solution(array $arr, array $prefixSumArray) : array
    {
        $lengthArr = count($arr);

        if ($lengthArr === 0) {
            return $arr;
        }

        $prefixSumArray[] = $arr[0];
        for ($i = 1; $i < $lengthArr; $i++) {
            $prefixSumArray[] = $prefixSumArray[$i - 1] + $arr[$i];
        }

        return $prefixSumArray;
    }

    $arr = [1,2,3,4,5];
    $prefixSumArray = [];
    $arrayNew = solution($arr, $prefixSumArray);
    print_r($arrayNew);