<?php

class MergeTwoArrays {

    public function mergeTwoArrays(array $arr1, array $arr2)
    {
        $n1 = sizeof($arr1);
        $n2 = sizeof($arr2);

        $arrayMerge = [];

        for ($i = 0; $i < $n1; $i++) {
            $arrayMerge[$i] = $arr1[$i];
        }

        for ($i = 0; $i < $n2; $i++) {
            $arrayMerge[$n1 + $i] = $arr2[$i];
        }

        return $arrayMerge;
    }

}

$arr1 = [1,2,3];
$arr2 = [4,5,6];
$mergeTwoArrays = new MergeTwoArrays();
print_r($mergeTwoArrays->mergeTwoArrays($arr1, $arr2));

