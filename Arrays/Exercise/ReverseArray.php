<?php

class ReverseArray {

    public function reverseArray(array $arr): array
    {
        $n = sizeof($arr);
        $arrReverse = [];
        for ($i = 0; $i < $n; $i++) {
            $arrReverse[] = $arr[$n - $i - 1];
        }

        return $arrReverse;
    }

}

$arr = [1,2,3,4,5];
$reverseArray = new ReverseArray();
print_r($reverseArray->reverseArray($arr));

