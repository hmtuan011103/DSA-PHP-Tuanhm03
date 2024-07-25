<?php
function solutionFirst($nums): array
{
    $n = count($nums);
    $result = array_fill(0, $n, -1);
    $stack = [];

    for ($i = $n - 1; $i >= 0; $i--) {
        while (!empty($stack) && $nums[$stack[count($stack) - 1]] <= $nums[$i]) {
            array_pop($stack);
        }

        if (!empty($stack)) {
            $result[$i] = $stack[count($stack) - 1];
        }

        $stack[] = $i;
    }

    return $result;
}

// Example usage:
$nums1 = [1, 3, 2, 4];
$nums2 = [7, 3, 2, 6, 11, 9, 8, 10, 13];

print_r(solutionFirst($nums1));
print_r(solutionFirst($nums2));
