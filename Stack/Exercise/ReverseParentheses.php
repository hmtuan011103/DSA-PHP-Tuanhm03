<?php

function SolutionFirst($s): string
{
    $stack = [];

    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] === ')') {
            $temp = '';
            while (end($stack) !== '(') {
                $temp .= array_pop($stack);
            }
            array_pop($stack);
            for ($j = 0; $j < strlen($temp); $j++) {
                $stack[] = $temp[$j];
            }
        } else {
            $stack[] = $s[$i];
        }
    }

    return implode('', $stack);
}

function SolutionSecond($s): string
{
    $start = strrpos($s, '(');
    // Find the position of the last occurrence of "(" inside the string:
    while ($start !== false) {
        $end = strpos($s, ')', $start);
        // Find the position of the first occurrence of ")" inside the string
        $sub = substr($s, $start + 1, $end - $start - 1);
        // Return part of a string
        $s = substr($s, 0, $start) . strrev($sub) . substr($s, $end + 1);

        $start = strrpos($s, '(');
    }
    return $s;
}

function SolutionThird($s): string
{
    $stack = [];
    $result = '';

    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] === '(') {
            $stack[] = $result;
            $result  = '';
        } elseif ($s[$i] === ')') {
            $temp = strrev($result);
            $result = $stack ? array_pop($stack) . $temp : $temp;
        } else {
            $result .= $s[$i];
        }
    }

    return $result;
}

$s1 = "(u(love)i)";
echo SolutionThird($s1) . "\n"; // Output: "iloveu"

//$s = "(u(love)i)";
//echo SolutionFirst($s) . "\n"; // Output: "iloveu"
//echo SolutionSecond($s) . "\n"; // Output: "iloveu"
//echo SolutionThird($s) . "\n"; // Output: "iloveu"
//
//
//$s = "(ed(et(oc))el)";
//echo SolutionFirst($s) . "\n"; // Output: "leetcode
//echo SolutionSecond($s) . "\n"; // Output: "leetcode"
//echo SolutionThird($s) . "\n"; // Output: "leetcode"
//
//$s = "a(bcdefghijkl(mno)p)q";
//echo SolutionFirst($s) . "\n"; // Output: "apmnolkjihgfedcbq
//echo SolutionSecond($s) . "\n"; // Output: "apmnolkjihgfedcbq"
//echo SolutionThird($s) . "\n"; // Output: "apmnolkjihgfedcbq"
