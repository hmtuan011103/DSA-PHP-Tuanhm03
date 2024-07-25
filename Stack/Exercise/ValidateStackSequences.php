<?php
function SolutionFirst($pushed, $popped): bool
{
    $stack = [];
    $j = 0;

    foreach ($pushed as $value) {
        $stack[] = $value;

        while (!empty($stack) && end($stack) === $popped[$j]) {
            array_pop($stack);
            $j++;
        }
    }

    return empty($stack);
}


$pushed1 = [1, 2, 3, 4, 5];
$popped1 = [4, 5, 3, 2, 1];
echo SolutionFirst($pushed1, $popped1) ? 'True' : 'False';


$pushed2 = [1, 2, 3, 4, 5];
$popped2 = [4, 3, 5, 1, 2];
echo SolutionFirst($pushed2, $popped2) ? 'True' : 'False';
