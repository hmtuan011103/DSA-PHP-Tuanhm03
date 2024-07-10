<?php
// Với đoạn code bên dưới thì chúng ta tạo ra 3 queue Simple chạy xong xong với nhau
class MultipleQueue {
    public array $queues = [];

    public function __construct($numQueues) {
        for ($i = 0; $i < $numQueues; $i++) {
            $this->queues[$i] = [];
        }
    }

    /**
     * @throws Exception
     */
    public function enqueue($queueNum, $item): void
    {
        if (isset($this->queues[$queueNum])) {
            $this->queues[$queueNum][] = $item;
        } else {
            throw new Exception("Invalid queue number");
        }
    }

    /**
     * @throws Exception
     */
    public function dequeue($queueNum) {
        if (isset($this->queues[$queueNum])) {
            if (!empty($this->queues[$queueNum])) {
                return array_shift($this->queues[$queueNum]);
            } else {
                throw new Exception("Queue is empty");
            }
        } else {
            throw new Exception("Invalid queue number");
        }
    }

    /**
     * @throws Exception
     */
    public function isEmpty($queueNum): bool
    {
        if (isset($this->queues[$queueNum])) {
            return empty($this->queues[$queueNum]);
        } else {
            throw new Exception("Invalid queue number");
        }
    }
}

    $multiQueue = new MultipleQueue(3);

    try {
        $multiQueue->enqueue(0, "Task1");
        $multiQueue->enqueue(1, "Task2");
        $multiQueue->enqueue(2, "Task3");
    } catch (Exception $e) {
    }

    print_r($multiQueue->queues);

    try {
        echo $multiQueue->dequeue(1) . "\n";
    } catch (Exception $e) {
    }  // Output: Task2
