<?php
class KthLargestSecond {
    private mixed $k;
    private array $nums;

    public function __construct($k, $nums) {
        $this->k = $k;
        $this->nums = [];

        foreach ($nums as $num) {
            $this->add($num);
        }
    }

    public function add($val) {
        if (count($this->nums) < $this->k) {
            $this->nums[] = $val;
            sort($this->nums);
        } elseif ($val > $this->nums[0]) {
            array_shift($this->nums);
            $this->nums[] = $val;
            sort($this->nums);
        }

        return count($this->nums) < $this->k ? null : $this->nums[0];
    }
}

function processCommands($commands, $params): array
{
    $kthLargest = null;
    $results = [];

    for ($i = 0; $i < count($commands); $i++) {
        switch ($commands[$i]) {
            case 'KthLargest':
                $kthLargest = new KthLargestSecond($params[$i][0], $params[$i][1]);
                $results[] = null;
                break;
            case 'add':
                $results[] = $kthLargest->add($params[$i][0]);
                break;
        }
    }

    return $results;
}

$commands = ["KthLargest", "add", "add", "add", "add", "add"];
$params = [[3, [4, 5, 8, 2]], [3], [5], [10], [9], [4]];

$output = processCommands($commands, $params);
print_r($output);