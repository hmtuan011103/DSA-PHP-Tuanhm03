<?php
function solutionFirst($s1, $s2): bool
{
    if (strlen($s1) !== strlen($s2)) {
        return false;
    }

    $stack1 = [];
    $stack2 = [];

    for ($i = 0; $i < strlen($s1); $i++) {
        $stack1[] = $s1[$i];
        $stack2[] = $s2[$i];
    }

    $count1 = array_fill(0, 256, 0);
    $count2 = array_fill(0, 256, 0);
    // ASCII code has a total of 256 characters.

    while (!empty($stack1)) {
        $char1 = array_pop($stack1);
        $char2 = array_pop($stack2);
        $count1[ord($char1)]++;
        $count2[ord($char2)]++;
    }

    for ($i = 0; $i < 256; $i++) {
        if ($count1[$i] !== $count2[$i]) {
            return false;
        }
    }

    return true;
}

function solutionSecond($s1, $s2): bool
{
    if (strlen($s1) !== strlen($s2)) {
        return false;
    }

    $count1 = [];
    $count2 = [];

    for ($i = 0; $i < strlen($s1); $i++) {
        $char1 = $s1[$i];
        $char2 = $s2[$i];

        if (!isset($count1[$char1])) {
            $count1[$char1] = 0;
        }
        $count1[$char1]++;

        if (!isset($count2[$char2])) {
            $count2[$char2] = 0;
        }
        $count2[$char2]++;
    }

    foreach ($count1 as $key => $value) {
        if (!isset($count2[$key]) || $count2[$key] !== $value) {
            return false;
        }
    }

    return true;
}

function solutionThird($s1, $s2): bool
{
    if (strlen($s1) !== strlen($s2)) {
        return false;
    }

    // Convert a string to an array
    $arr1 = str_split($s1);
    $arr2 = str_split($s2);

    sort($arr1);
    sort($arr2);

    return $arr1 === $arr2;
}


function solutionFour($s1, $s2): bool
{
    if (strlen($s1) !== strlen($s2)) {
        return false;
    }

    $count = [];

    for ($i = 0; $i < strlen($s1); $i++) {
        $char1 = $s1[$i];
        $char2 = $s2[$i];

        if (!isset($count[$char1])) {
            $count[$char1] = 0;
        }
        $count[$char1]++;

        if (!isset($count[$char2])) {
            $count[$char2] = 0;
        }
        $count[$char2]--;
    }

    foreach ($count as $value) {
        if ($value !== 0) {
            return false;
        }
    }

    return true;
}

echo "Stack \n";
var_dump(solutionFirst("listen", "silent"));
var_dump(solutionFirst("triangle", "integral"));
var_dump(solutionFirst("apple", "papel"));
var_dump(solutionFirst("hello", "world"));


echo "HashMap \n";
var_dump(solutionSecond("listen", "silent"));
var_dump(solutionSecond("triangle", "integral"));
var_dump(solutionSecond("apple", "papel"));
var_dump(solutionSecond("hello", "world"));

echo "Sort \n";
var_dump(solutionThird("listen", "silent"));
var_dump(solutionThird("triangle", "integral"));
var_dump(solutionThird("apple", "papel"));
var_dump(solutionThird("hello", "world"));


echo "HashMap2 \n";
var_dump(solutionFour("listen", "silent"));
var_dump(solutionFour("triangle", "integral"));
var_dump(solutionFour("apple", "papel"));
var_dump(solutionFour("hello", "world"));

