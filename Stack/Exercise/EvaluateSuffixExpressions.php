<?php

function solutionFirst($tokens) {
    $stack = [];

    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $stack[] = $token;
        } else {
            $operand2 = array_pop($stack);
            $operand1 = array_pop($stack);

            $result = match ($token) {
                '+' => $operand1 + $operand2,
                '-' => $operand1 - $operand2,
                '*' => $operand1 * $operand2,
                '/' => intval($operand1 / $operand2)
            };

            $stack[] = $result;
        }
    }

    return array_pop($stack);
}


$input1 = ["2", "1", "+", "3", "*"];
$input2 = ["4", "13", "5", "/", "+"];
$input3 = ["10", "+", "9", "3", "+", "-11", "*", "/", "*", "17", "+", "5", "+"];

echo "Output 1: " . solutionFirst($input1) . "\n";

echo "Output 2: " . solutionFirst($input2) . "\n";

echo "Output 3: " . solutionFirst($input3) . "\n";
