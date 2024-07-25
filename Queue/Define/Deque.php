<?php
// May be Double-ended Queue
// Được hiểu là phần từ được lấy ra, và thêm vào queue từ cả 2 đầu của queue
class Deque {
    private array $deque = [];

    public function addFront($item): void
    {
        array_unshift($this->deque, $item);
    }

    public function addRear($item): void
    {
        $this->deque[] = $item;
    }

    /**
     * @throws Exception
     */
    public function removeFront()
    {
        if (!$this->isEmpty()) {
            return array_shift($this->deque);
        } else {
            throw new Exception("Deque is empty");
        }
    }

    /**
     * @throws Exception
     */
    public function removeRear()
    {
        if (!$this->isEmpty()) {
            return array_pop($this->deque);
        } else {
            throw new Exception("Deque is empty");
        }
    }

    public function isEmpty(): bool
    {
        return empty($this->deque);
    }

    /**
     * @throws Exception
     */
    public function peekFront() {
        if (!$this->isEmpty()) {
            return $this->deque[0];
        } else {
            throw new Exception("Deque is empty");
        }
    }

    /**
     * @throws Exception
     */
    public function peekRear() {
        if (!$this->isEmpty()) {
            return end($this->deque);
        } else {
            throw new Exception("Deque is empty");
        }
    }
}

    $deque = new Deque();
    $deque->addRear(1);
    $deque->addFront(2);

    try {
        echo $deque->removeFront() . "\n"; // Output: 2
    } catch (Exception $e) {
    }

    try {
        echo $deque->removeRear() . "\n"; // Output: 1
    } catch (Exception $e) {
    }
