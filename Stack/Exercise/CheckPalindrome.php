<?php

function isPalindrome($str, $strLength): bool
{
    if ($str === '') {
        return true;
    }

    $left = 0;
    $right = $strLength - 1;

    while ($left <= $right) {
        if ($str[$left] !== $str[$right]) {
            return false;
        }
        $left++;
        $right--;
    }

    return true;
}

function solutionFirst($str): bool
{
    $stack = [];
    $strLength = strlen($str);

    for ($i = 0; $i < $strLength; $i++) {
        if ($str[$i] === '*') {
            if (!empty($stack)) {
                array_pop($stack);
            }
        } else {
            $stack[] = $str[$i];
        }
    }

    $result = implode('', $stack);
    return isPalindrome($result, strlen($result));
}
function solutionSecond($str): bool
{
    $result = '';
    $strLength = strlen($str);

    for ($i = 0; $i < $strLength; $i++) {
        if ($str[$i] === '*') {
            if (!empty($result)) {
                $result = substr($result, 0, -1);
            }
        } else {
            $result .= $str[$i];
        }
    }

    return isPalindrome($result, strlen($result));
}

$str = 'ab*ba';
$strSecond = 'abcd';
$strThird = 'a**';
$strFour = '*';
var_dump(solutionFirst($strSecond));
var_dump(solutionSecond($strSecond));