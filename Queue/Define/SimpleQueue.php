<?php

class SimpleQueue {

    private array $queue = [];

    public function enqueue($item): void
    {
        $this->queue[] = $item;
    }

    /**
     * @throws Exception
     */
    public function dequeue()
    {
        if (!$this->isEmpty()) {
            return array_shift($this->queue);
        } else {
            throw new Exception("Queue is empty");
        }
    }

    public function isEmpty(): bool
    {
        return empty($this->queue);
    }

    /**
     * @throws Exception
     */
    public function peek()
    {
        if (!$this->isEmpty()) {
            return $this->queue[0];
        } else {
            throw new Exception("Queue is empty");
        }
    }
}

    $queue = new SimpleQueue();
    $queue->enqueue(1111);
    $queue->enqueue(2222);
    $queue->enqueue(33333);

    try {
        echo $queue->dequeue();
    } catch (Exception $e) {
        return false;
    }
