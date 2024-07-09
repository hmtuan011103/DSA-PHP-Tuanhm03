<?php


//Description: Given an integer array nums,
// return true if any value appears at least twice in the array, and return false if every element is distinct.
//Input:
//nums = [1,2,3,1]
//              i
//Output: True

// min = 1
// max = 3
// [1,1,1]
//  1 2 3


function solution1($nums): bool
{
    $maxValue = max($nums);
    $minValue = min($nums);

    $count = array_fill($minValue, $maxValue - $minValue + 1, 0);

    foreach ($nums as $num) {
        if ($count[$num] > 0) {
            return true;
        }
        $count[1]++;
    }
    return false;
}











//Description: Given an integer array nums,
// return true if any value appears at least twice in the array, and return false if every element is distinct.
//Input:
//nums = [1,2,3,1]
//Output: True

// hashmap = [1 => true, 2 => true, 3 => true]


function solution2($nums): bool
{
    $n = count($nums);
    $hashmap = [];
    for ($i = 0; $i < $n; $i++) {
        if (isset($hashmap[$nums[$i]])) {
            return true;
        }
       $hashmap[$nums[$i]] = true;
    }
    return false;
}



function solution3($nums): bool
{
    sort($nums);
    $n = count($nums);
    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] == $nums[$i + 1]) {
            return true;
        }
    }
    return false;
}



$nums = [1,2,3,1];

echo "\n";
echo "Solution array";
echo "\n";
echo solution1($nums) ? 'true' : 'false';

echo "\n";
echo "Solution hashmap";
echo "\n";
echo solution2($nums) ? 'true' : 'false';

echo "\n";
echo "Solution sort";
echo "\n";
echo solution3($nums) ? 'true' : 'false';
