<?php

class RotateArray {

    public function rotateArray(array $arr, $k): array
    {
        $n = count($arr);

        if ($n === 0) {
            return $arr;
        }

        $k = $k % $n;
        $temp = [];

        for ($i = 0; $i < $k; $i++) {
            $temp[$i] = $arr[$n - $k + $i];
        }

        for ($i = $n - 1; $i >= $k; $i--) {
            $arr[$i] = $arr[$i - $k];
        }

        for ($i = 0; $i < $k; $i++) {
            $arr[$i] = $temp[$i];
        }

        return $temp;
    }

}

$arr = [1,2,3,4,5];
$k = 15;
$rotateArray = new RotateArray();
print_r($rotateArray->rotateArray($arr, $k));

