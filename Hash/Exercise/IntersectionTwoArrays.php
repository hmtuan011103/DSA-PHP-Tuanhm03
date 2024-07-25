<?php

function solution1($nums1, $nums2): array
{
    sort($nums1);
    sort($nums2);

    $result = [];
    $i = 0;
    $j = 0;

    while ($i < count($nums1) && $j < count($nums2)) {
        if ($nums1[$i] === $nums2[$j]) {
            if (empty($result) || $nums1[$i] !== end($result)) {
                $result[] = $nums1[$i];
            }
            $i++;
            $j++;
        } elseif ($nums1[$i] < $nums2[$j]) {
            $i++;
        } else {
            $j++;
        }
    }

    return $result;
}

function solution2($nums1, $nums2): array
{
    $map = [];
    $result = [];

    foreach ($nums1 as $num) {
        if (!isset($map[$num])) {
            $map[$num] = 1;
        }
    }

    foreach ($nums2 as $num) {
        if (isset($map[$num])) {
            $result[] = $num;
            unset($map[$num]);
        }
    }

    return $result;
}

function solution3($nums1, $nums2): array
{
    $set = [];
    $result = [];

    foreach ($nums1 as $num) {
        $set[$num] = true;
    }

    foreach ($nums2 as $num) {
        if (isset($set[$num])) {
            $result[] = $num;
            unset($set[$num]);
        }
    }

    return $result;
}



$nums1 = [4, 9, 5];
$nums2 = [9, 4, 9, 8, 4];

echo "\n";
echo "Solution two pointer";
echo "\n";
print_r(solution1($nums1, $nums2));

echo "\n";
echo "Solution hashmap";
echo "\n";
print_r(solution2($nums1, $nums2));

echo "\n";
echo "Solution hashset";
echo "\n";
print_r(solution3($nums1, $nums2));

