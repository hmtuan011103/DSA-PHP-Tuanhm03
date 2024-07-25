<?php

class InsertElement {

    public function insertElement(array $arr, int $pos, $value)
    {
        $n = sizeof($arr);

        if ($pos < 0 || $pos >= $n) {
            return -1;
        }

        for ($i = $n - 1; $i >= $pos; $i--) {
            $arr[$i + 1] = $arr[$i];
        }

        $arr[$pos] = $value;

        return $arr;
    }

}

$arr = [1,2,3,4,5];
$pos = 2;
$value = 99;
$insertElement = new InsertElement();
print_r($insertElement->insertElement($arr, $pos, $value));

