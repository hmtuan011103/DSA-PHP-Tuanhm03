<?php

class MyStack
{
    private array $queue1;
    private array $queue2;

    public function __construct()
    {
        $this->queue1 = [];
        $this->queue2 = [];
    }

    public function push($x): void
    {
        $this->queue1[] = $x;
    }

    public function pop(): int
    {
        while (count($this->queue1) > 1) {
            $this->queue2[] = array_shift($this->queue1);
        }
        $res = array_shift($this->queue1);

        $this->queue1 = $this->queue2;
        $this->queue2 = [];

        return $res;
    }

    public function top(): int
    {
        while (count($this->queue1) > 1) {
            $this->queue2[] = array_shift($this->queue1);
        }
        $res            = array_shift($this->queue1);
        $this->queue2[] = $res;

        $this->queue1 = $this->queue2;
        $this->queue2 = [];

        return $res;
    }

    public function empty(): bool
    {
        return empty($this->queue1);
    }
}

$stack = new MyStack();
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);

echo $stack->top() . "\n"; // Output: 2
echo $stack->pop() . "\n"; // Output: 2

echo $stack->empty() ? 'true' : 'false'; // Output: false
