<?php
class CircularQueue {

    public array $queue;
    private int $size;
    private int $front;
    private int $rear;

    public function __construct($size)
    {
        $this->size = $size;
        $this->queue = array_fill(0, $size, null);
        $this->front = -1;
        $this->rear = -1;
    }

    /**
     * @throws Exception
     */
    public function enqueue($item): void
    {
        if (($this->rear + 1) % $this->size === $this->front) {
            throw new Exception("Queue is full \n");
        } elseif ($this->front === -1) {
            $this->front = $this->rear = 0;
            $this->queue[$this->rear] = $item;
        } else {
            $this->rear = ($this->rear + 1) % $this->size;
            $this->queue[$this->rear] = $item;
        }
    }

    /**
     * @throws Exception
     */
    public function dequeue() {
        if ($this->front === -1) {
            throw new Exception("Queue is empty \n");
        } elseif ($this->front === $this->rear) {
            $temp = $this->queue[$this->front];
            $this->queue[$this->front] = null;
            $this->front = $this->rear = -1;
            return $temp;
        } else {
            $temp = $this->queue[$this->front];
            $this->queue[$this->front] = null;
            $this->front = ($this->front + 1) % $this->size;
            return $temp;
        }
    }

    public function isEmpty(): bool
    {
        return $this->front === -1;
    }

    /**
     * @throws Exception
     */
    public function peek()
    {
        if ($this->isEmpty()) {
            throw new Exception("Queue is empty \n");
        }
        return $this->queue[$this->front];
    }
}

    $queue = new CircularQueue(5);

    try {
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);
        $queue->enqueue(4);
        $queue->enqueue(5);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


    try {
        echo $queue->dequeue() . "\n";
    } catch (Exception $e) {

    }  // Output: 1


    try {
        echo $queue->dequeue() . "\n";
    } catch (Exception $e) {

    }  // Output: 2


    try {
        $queue->enqueue(6);
        $queue->enqueue(7);
        $queue->enqueue(8);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    print_r($queue->queue);

    try {
        echo $queue->peek();
    } catch (Exception $e) {
        echo $e->getMessage();
    }