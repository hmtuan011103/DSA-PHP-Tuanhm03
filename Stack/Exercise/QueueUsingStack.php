<?php

class MyQueue
{
    public array $stack1;
    private array $stack2;

    public function __construct()
    {
        $this->stack1 = [];
        $this->stack2 = [];
    }

    public function push($x): void
    {
        $this->stack1[] = $x;
    }

    public function pop(): int
    {
        if (empty($this->stack2)) {
            while (!empty($this->stack1)) {
                $this->stack2[] = array_pop($this->stack1);
            }
        }
        return array_pop($this->stack2);
    }

    public function peek(): int
    {
        if (empty($this->stack2)) {
            while (!empty($this->stack1)) {
                $this->stack2[] = array_pop($this->stack1);
            }
        }
        return end($this->stack2);
    }

    public function empty(): bool
    {
        return empty($this->stack1) && empty($this->stack2);
    }
}

$queue = new MyQueue();

$queue->push(1);
$queue->push(2);
$queue->push(3);
$queue->push(4);

echo $queue->peek() . "\n"; // Output: 1
echo $queue->pop() . "\n"; // Output: 1

echo $queue->empty() ? 'true' : 'false';
