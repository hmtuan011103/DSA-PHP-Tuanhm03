<?php

class Solution {

    // Program to find the minimum (or maximum) element of an array
    // Time complexity: O (n log(n))
    // Auxiliary Space: O(1)
    // This complexity is between O(n) and O(n^2).
    // It is faster than O(n^2) but slower than O(n) when n is large.

    public function findMaxMin(array $array, int $n): void
    {
        $min = $array[0];
        $max = $array[0];

        for ($i = 0; $i < $n; $i++) {
            if ($array[$i] < $min) {
                $min = $array[$i];
            }
            elseif ($array[$i] > $max) {
                $max = $array[$i];
            }
        }

        echo "Min: $min. Max: $max";
    }

}

class RecursiveSolution {

    public function findMin(array $array, int $n): int|float
    {
        if ($n === 1) {
            return $array[0];
        } else {
            return $this->findMin(array_slice($array, 1), $n - 1) < $array[0] ?
                $this->findMin(array_slice($array, 1), $n - 1) :
                $array[0];
        }
    }


    public function findMax(array $array, int $n): int|float
    {
        if ($n === 1) {
            return $array[0];
        } else {
            return $this->findMax(array_slice($array, 1), $n - 1) > $array[0] ?
                $this->findMax(array_slice($array, 1), $n - 1) :
                $array[0];
        }
    }
}


$array = [1, 999, 5, -888, -90];
$n = sizeof($array);
$solution = new Solution();
$solution->findMaxMin($array, $n);

echo "\n";

$recursiveSolution = new RecursiveSolution();

echo "Min: " . $recursiveSolution->findMin($array, $n) .  "\n";
echo "Max: " . $recursiveSolution->findMax($array, $n);