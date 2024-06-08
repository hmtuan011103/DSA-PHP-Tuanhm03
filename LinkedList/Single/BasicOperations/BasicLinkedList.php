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
     * Constraints:
     * The list is guaranteed to be sorted in ascending order.
     * @return Node|null
     */
    public function deleteDuplicates(): ?Node
    {
        $prev    = $this->head;
        $current = $this->head->next;

        while ($current !== null) {
            if ($prev->data === $current->data) {
                $temp       = $current->next;
                $prev->next = $temp;
                $current    = $temp;
            } else {
                $prev    = $current;
                $current = $current->next;
            }
        }

        return $this->head;
    }

    public function insertToBegin($data): void
    {
        $firstNode       = new Node($data);
        $firstNode->next = $this->head;
        $this->head      = $firstNode;
    }

    public function insertAfter($prevNode, $data): int
    {
        if ($prevNode === null) {
            return -1;
        }
        $newNode        = new Node($data);
        $newNode->next  = $prevNode->next;
        $prevNode->next = $newNode;
        return 1;
    }

    public function getNodeByValue($data): ?Node
    {
        $current = $this->head;

        while ($current !== null) {
            if ($current->data === $data) {
                return $current;
            }
            $current = $current->next;
        }

        return null;
    }

    public function traverse(): void
    {
        $current = $this->head;

        while ($current !== null) {
            echo $current->data . ' ';
            $current = $current->next;
        }
    }

    public function removeElements($head, $val) {
        if ($head === null) {
            return null;
        }

        $head->next = $this->removeElements($head->next, $val);

        if ($head->data === $val) {
            return $head->next;
        }

        return $head;


//        $dummy = new ListNode(0);
//        $dummy->next = $head;
//        $current = $dummy;
//
//        while ($current->next !== null) {
//            if ($current->next->val === $val) {
//                $current->next = $current->next->next;
//            } else {
//                $current = $current->next;
//            }
//        }
//
//        return $dummy->next;
    }

}

$basicLinkedList = new BasicLinkedList();

$basicLinkedList->insert(1);
$basicLinkedList->insert(2);
$basicLinkedList->insert(6);
$basicLinkedList->insert(3);
$basicLinkedList->insert(4);
$basicLinkedList->insert(5);
$basicLinkedList->insert(6);

//$nodeByValue = $basicLinkedList->getNodeByValue(3);
$data = $basicLinkedList->head;
$basicLinkedList->removeElements($data, 6);

//$newLinkedList = $basicLinkedList->deleteDuplicates();
//$basicLinkedList->traverse();



