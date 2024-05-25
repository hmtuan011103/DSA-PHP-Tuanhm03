<?php

class Initialize {

    public function initialize(array $arr): void
    {
        $n = sizeof($arr);
        for($i = 0; $i < $n; $i++) {
            echo $arr[$i] . ' ';
        }
    }
}

$arr = [1,2,3,4,5];
$initialize = new Initialize();
$initialize->initialize($arr);

