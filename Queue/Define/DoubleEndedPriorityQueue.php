<?php

class DoubleEndedPriorityQueue {

    public array $queue = [];

    public function addRear($item, $priority): void
    {
        $this->queue[] = ['item' => $item, 'priority' => $priority];
        usort($this->queue, function($a, $b) {
            return $a['priority'] - $b['priority'];
        });
    }

    public function addFront($item, $priority): void
    {
        array_unshift($this->queue, ['item' => $item, 'priority' => $priority]);
        usort($this->queue, function($a, $b) {
            return $a['priority'] - $b['priority'];
        });
    }

    /**
     * @throws Exception
     */
    public function removeMin()
    {
        if (!$this->isEmpty()) {
            return array_shift($this->queue)['item'];
        } else {
            throw new Exception("Queue is empty");
        }
    }

    /**
     * @throws Exception
     */
    public function removeMax()
    {
        if (!$this->isEmpty()) {
            return array_pop($this->queue)['item'];
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
    public function peekMin()
    {
        if (!$this->isEmpty()) {
            return $this->queue[0]['item'];
        } else {
            throw new Exception("Queue is empty");
        }
    }

    /**
     * @throws Exception
     */
    public function peekMax() {
        if (!$this->isEmpty()) {
            return end($this->queue)['item'];
        } else {
            throw new Exception("Queue is empty");
        }
    }
}

    $depq = new DoubleEndedPriorityQueue();
    $depq->addRear("Task1", 3);
    $depq->addRear("Task2", 1);
    $depq->addRear("Task3", 2);
    $depq->addFront("Task44444", 2);

    try {
        echo $depq->removeMin() . "\n"; // Lấy và xóa 1 phần tử có độ ưu tiên cao
    } catch (Exception $e) {
    }  // Output: Task2

    try {
        echo $depq->removeMax() . "\n"; // Lấy và xóa 1 phần tử có độ ưu tiên thấp
    } catch (Exception $e) {
    }  // Output: Task1


    try {
        echo $depq->peekMin() . "\n";
    } catch (Exception $e) {
    }  // Output: Task44444

    try {
        echo $depq->peekMax() . "\n";
    } catch (Exception $e) {
    }  // Output: Task3

    print_r($depq->queue);
