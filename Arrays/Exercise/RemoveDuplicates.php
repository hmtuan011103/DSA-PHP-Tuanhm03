<?php

class RemoveDuplicates {

    public function RemoveDuplicates(array $arr): array
    {
        $n = count($arr);

        $unionArray = [];

        for ($i = 0; $i < $n; $i++) {
            $isUnion = true;
            for ($j = 0; $j < count($unionArray); $j++) {
                if ($arr[$i] === $unionArray[$j]) {
                    $isUnion = false;
                    break;
                }
            }
            if ($isUnion) {
                $unionArray[] = $arr[$i];
            }
        }

        return $unionArray;
    }

}

$arr = [1, 2, 3, 4, 3, 2, 1];
$k = 2;
$removeDuplicates = new RemoveDuplicates();
print_r($removeDuplicates->RemoveDuplicates($arr));

