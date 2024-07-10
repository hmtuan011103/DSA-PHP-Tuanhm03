<?php

function SolutionFirst($nums, $k): array
{
    sort($nums);
    return array_slice($nums, 0, $k);
}

function SolutionSecond($nums, $k): array
{
    $stack = [];

    foreach ($nums as $num) {
        if (count($stack) < $k) {
            $stack[] = $num;
            continue;
        }

        $maxIndex = 0;
        for ($i = 1; $i < $k; $i++) {
            if ($stack[$i] > $stack[$maxIndex]) {
                $maxIndex = $i;
            }
        }

        if ($num < $stack[$maxIndex]) {
            $stack[$maxIndex] = $num;
        }
    }

    return $stack;
}


$nums = [5, 9, 3, 6, 2, 1, 3, 2, 7, 5];
$k = 4;
print_r(SolutionFirst($nums, $k));
print_r(SolutionSecond($nums, $k));

