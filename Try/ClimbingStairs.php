<?php

class ClimbingStairs {

    //    Example:
    //    You are climbing a staircase. It takes n steps to reach the top.
    //    Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top
    //
    //    Input n = 3
    //    Output 3
    //
    //    Explanation: There are three ways to climb to the top
    //    1. 1 step + 1 step + 1 step
    //    2. 1 step + 2 steps
    //    3. 2 steps + 1 step

    public function climbingStarts(int $n): int
    {
       $fn1 = 1;
       $fn2 = 2;

       if ($fn1 === $n) {
           return $fn1;
       }

       if ($fn2 === $n) {
           return $fn2;
       }

       $fn3 = '';

       for ($i = 3; $i <= $n; $i++) {
           $fn3 = $fn1 + $fn2;
           $fn1 = $fn2;
           $fn2 = $fn3;
       }

       return $fn3;

    }
}

$climbingStairs = new ClimbingStairs();
$fn = $climbingStairs->climbingStarts(3);
echo $fn;