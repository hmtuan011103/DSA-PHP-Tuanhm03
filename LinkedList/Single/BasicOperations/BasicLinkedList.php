<?php

use LinkedList\Single\Node;

require '../Node.php';

class BasicLinkedList
{
    public $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function insert($data): ?Node
    {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }

        return $this->head;
    }

    /**
     * Given the head of a sorted linked list, delete all duplicates such that each element appears only once.
     * Return the linked list sorted as well.
     *
     * Input: head = [1,1,2]
     * Output: [1,2]
     *
     * Input: head = [1,1,2,3,3]
     * Output: [1,2,3]
     *
     * Constraints
     * The number of nodes in the list is in the range [0, 300].
     * -100 <= Node.val <= 100
     * The list is guaranteed to be sorted in ascending order.
     * @return Node|null
     */
    public function deleteDuplicates(): ?Node
    {
        $prev = $this->head;
        $current = $this->head->next;

        while ($current !== null) {
            if ($prev->data === $current->data) {
                $temp = $current->next;
                $prev->next = $temp;
                $current = $temp;
            } else {
                $prev = $current;
                $current = $current->next;
            }
        }

        return $this->head;
    }

    public function insertToBegin($data): void
    {
        $firstNode = new Node($data);
        $firstNode->next = $this->head;
        $this->head = $firstNode;
    }

    public function insertAfter($prevNode, $data): int
    {
        if ($prevNode === null) {
            return -1;
        }
        $newNode = new Node($data);
        $newNode->next = $prevNode->next;
        $prevNode->next = $newNode;
        return 1;
    }

    public function getNodeByValue($data): Node|int
    {
        $current = $this->head;

        while ($current !== null) {
            if ($current->data === $data) {
                return $current;
            }
            $current = $current->next;
        }

        return -1;
    }

    public function traverse(): void
    {
        $current = $this->head;

        while ($current !== null) {
            echo $current->data . ' ';
            $current = $current->next;
        }
    }
}

$basicLinkedList = new BasicLinkedList();

$basicLinkedList->insert(1);
$basicLinkedList->insert(1);
$basicLinkedList->insert(2);
$basicLinkedList->insert(3);
$basicLinkedList->insert(3);

//$nodeByValue = $basicLinkedList->getNodeByValue(3);
//$basicLinkedList->insertAfter($nodeByValue, 999);

$newLinkedList = $basicLinkedList->deleteDuplicates();
$basicLinkedList->traverse();



