<?php
class PriorityQueue {

    public array $queue = [];

    public function enqueue($item, $priority): void
    {
        $this->queue[] = ['item' => $item, 'priority' => $priority];
        usort($this->queue, function($a, $b) {
            return $a['priority'] <=> $b['priority'];
        });
    }

    /**
     * @throws Exception
     */
    public function dequeue() {
        if (!$this->isEmpty()) {
            return array_shift($this->queue)['item'];
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
    public function peek() {
        if (!$this->isEmpty()) {
            return $this->queue[0]['item'];
        } else {
            throw new Exception("Queue is empty");
        }
    }
}

    $queue = new PriorityQueue();
    $queue->enqueue("Task1", 1);
    $queue->enqueue("Task2", 0);

    try {
        echo $queue->dequeue() . "\n";  // Output: Task2
    } catch (Exception $e) {

    }

    print_r($queue->queue);


    // Nó vẫn hoạt động như queue bình thường, nhưng có cái là nó sẽ ưu tiên cái gì chạy trước và cái gì chạy sau (cái ưu tiên này do chúng ta định nghĩa bất kì)
