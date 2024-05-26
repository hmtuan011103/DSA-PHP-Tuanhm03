<?php

class LinearSearch {

    public function linearSearch(array $arr, int $target)
    {
        $n = sizeof($arr);

        for ($i = 0; $i < $n; $i++) {
            if ($arr[$i] === $target) {
                return 'The element ' . $target . ' is found at index ' . $i;
            }
        }

        return -1;
    }

}

$arr = [1,2,3,4,5];
$target = 3;
$linearSearch = new LinearSearch();
print_r($linearSearch->linearSearch($arr, $target));

