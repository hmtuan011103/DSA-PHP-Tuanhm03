<?php

class FindMaximumElement {

    public function findMaximumElement(array $arr): int|float
    {
        $n = sizeof($arr);
        $max = $arr[0];
        for($i = 0; $i < $n; $i++) {
            if ($arr[$i] > $max) {
               $max = $arr[$i];
            }
        }

        return $max;
    }
}

$arr = [1,2,3,4,5];
$findMaximumElement = new FindMaximumElement();
echo $findMaximumElement->findMaximumElement($arr);

