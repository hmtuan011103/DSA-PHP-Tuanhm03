<?php

class DeleteElement {

    public function deleteElement(array $arr, int $pos)
    {
        $n = sizeof($arr);

        if ($pos < 0 || $pos >= $n) {
            return -1;
        }

        for ($i = $pos; $i < $n - 1; $i++) {
            $arr[$i] = $arr[$i + 1];
        }

        unset($arr[$n - 1]);

        return $arr;
    }

}

$arr = [1,2,3,4,5];
$pos = 2;
$deleteElement = new DeleteElement();
print_r($deleteElement->deleteElement($arr, $pos));

