<?php

function solution1(string $string): int
{
    $count = array_fill(0, 26, 0);

    for ($i = 0; $i < strlen($string); $i++) {
        $count[ord($string[$i]) - ord('a')]++;
    }

    for ($i = 0; $i < strlen($string); $i++) {
        if ($count[ord($string[$i]) - ord('a')] === 1) {
            return $i;
        }
    }

    return -1;
}

function solution2(string $string): int
{
    $charCount = [];

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        if (!isset($charCount[$char])) {
            $charCount[$char] = 0;
        }
        $charCount[$char]++;
    }

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        if ($charCount[$char] === 1) {
            return $i;
        }
    }

    return -1;
}

$string = 'leetcode';

echo "\n";
echo "Solution normal";
echo "\n";
echo solution1($string);

echo "\n";
echo "Solution hashmap";
echo "\n";
echo solution2($string);


