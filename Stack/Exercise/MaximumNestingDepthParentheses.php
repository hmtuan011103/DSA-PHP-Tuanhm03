<?php
function SolutionFirst($s): int
{
    $maxDepth = 0;
    $currentDepth = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] == '(') {
            $currentDepth++;
            if ($currentDepth > $maxDepth) {
                $maxDepth = $currentDepth;
            }
        } elseif ($s[$i] == ')') {
            $currentDepth--;
        }
    }

    return $maxDepth;
}

$s1 = "(1+(2*3)+((8)/4))+1";
echo SolutionFirst($s1) . "\n"; // Output: 3

$s2 = "(1)+((2))+(((3)))";
echo SolutionFirst($s2) . "\n"; // Output: 3

$s3 = "()(())((()()))";
echo SolutionFirst($s3) . "\n"; // Output: 3
