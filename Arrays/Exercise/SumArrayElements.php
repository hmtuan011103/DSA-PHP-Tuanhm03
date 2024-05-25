<?php

class SumArrayElements {

    public function sumArrayElements(array $arr): int|float
    {
        $n = sizeof($arr);
        $sum = 0;
        for($i = 0; $i < $n; $i++) {
            $sum += $arr[$i];
        }

        return $sum;
    }
}

$arr = [1,2,3,4,5];
$sumArrayElements = new SumArrayElements();
echo $sumArrayElements->sumArrayElements($arr);

