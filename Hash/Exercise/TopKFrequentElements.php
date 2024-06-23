<?php

function solution($nums, $k): array
{
    sort($nums);
    $n = count($nums);
    $hashmap = [];
    for ($i = 0; $i < $n; $i++) {
        $key = $nums[$i];
        if (isset($hashmap[$key])) {
            $hashmap[$key]++;
        } else {
            $hashmap[$key] = 1;
        }
    }

    $result = [];
    $count = 0;
    foreach ($hashmap as $num => $freq) {
        if ($count === $k){
            break;
        }
        $result[] = $num;
        $count++;
    }

    return $result;
}

$nums = [1,1,1,3,2,2];
$k = 2;

echo "\n";
echo "Solution hashmap";
echo "\n";
print_r(solution($nums, $k));