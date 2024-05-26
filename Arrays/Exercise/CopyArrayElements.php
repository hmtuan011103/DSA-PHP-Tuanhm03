<?php

class CopyArrayElements {

    public function copyArrayElements(array $arr)
    {
        $n = sizeof($arr);

        $arrayNew = [];

        for ($i = 0; $i < $n; $i++) {
            $arrayNew[$i] = $arr[$i];
        }

        return $arrayNew;
    }

}

$arr = [1,2,3,4,5];
$copyArrayElements = new CopyArrayElements();
print_r($copyArrayElements->copyArrayElements($arr));

