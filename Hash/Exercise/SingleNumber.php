<?php

// Vì XOR của hai số giống nhau sẽ bằng 0 ( OR bit)
// XOR của bất kỳ số nào với 0 đều bằng chính nó
function solution1($nums): int
{
    $single = 0;
    foreach ($nums as $num) {
        $single ^= $num;
    }
    return $single;
}

function solution2($nums): int
{
    $map = [];
    foreach ($nums as $num) {
        if(isset($map[$num]))
            $map[$num]++;
        else
            $map[$num] = 1;
    }
    foreach ($map as $key => $value) {
        if ($value === 1) {
            return $key;
        }
    }
    return -1;
}

function solution3($nums): int
{
    $set = [];
    foreach ($nums as $num) {
        if(isset($set[$num]))
            unset($set[$num]);
        else
            $set[$num] = 1;
    }
    if (isset(array_keys($set)[0])){
        return array_keys($set)[0];
    }
    return -1;
}



$nums = [4,4,2,2,3];

echo "\n";
echo "Solution array";
echo "\n";
echo solution1($nums);

echo "\n";
echo "Solution hashmap";
echo "\n";
echo solution2($nums);

echo "\n";
echo "Solution hashset";
echo "\n";
echo solution3($nums);
