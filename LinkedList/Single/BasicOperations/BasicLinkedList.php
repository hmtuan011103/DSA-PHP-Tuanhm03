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
//        if ($head === null) {
//            return null;
//        }
//
//        $head->next = $this->removeElements($head->next, $val);
//
//        if ($head->data === $val) {
//            return $head->next;
//        }
//
//        return $head;


        $dummy = new Node(0);
        $dummy->next = $head;
        $current = $dummy;

        while ($dummy->next !== null) {
            if ($dummy->next->data === $val) {
                $dummy->next = $dummy->next->next;
            } else {
                $dummy = $dummy->next;
            }
        }

        return $current->next;
    }

    public function middleNode($head) {
        $slow = $head;

        while ($head !== null && $head->next !== null) {
            $slow = $slow->next;
            $head = $head->next->next;
        }

        return $slow;
    }

//    public function isPalindrome($head) {
//        $slow = $head;
//        $fast = $head;
//
//        while ($fast !== null) {
//            $slow = $slow->next;
//            $fast = $fast->next->next;
//        }
//
//        $secondHalfHead = null;
//
//        while ($slow !== null) {
//            $nextNode = $slow->next;
//            $slow->next = $secondHalfHead;
//            $secondHalfHead = $slow;
//            print_r($secondHalfHead);
//            die();
//            $slow = $nextNode;
//        }
//
//        print_r($secondHalfHead);
//
//        while ($secondHalfHead !== null) {
//            if ($head->data !== $secondHalfHead->data) {
//                return false;
//            }
//            $head = $head->next;
//            $secondHalfHead = $secondHalfHead->next;
//        }
//        return true;
//    }

    public function removeNthNode($nth, $head) {
        $nodeLength = 0;

        $dummy = new Node(0);
        $dummy->next = $head;
        $current = $dummy;

        while ($head !== null) {
            $nodeLength++;
            $head = $head->next;
        }

        $nth = $nodeLength - $nth + 1;

        $flag = 0;
        while ($current !== null) {
            $flag++;
            if ($nth === $flag) {
                $current->next = $current->next->next;
            } else {
                $current = $current->next;
            }
        }
        print_r($dummy->next);
        return $dummy->next;
    }

}

$basicLinkedList = new BasicLinkedList();

$basicLinkedList->insert(1);
$basicLinkedList->insert(2);
$basicLinkedList->insert(3);
$basicLinkedList->insert(4);
$basicLinkedList->insert(5);

//$nodeByValue = $basicLinkedList->getNodeByValue(3);
$data = $basicLinkedList->head;
$basicLinkedList->removeNthNode(1, $data);
//$basicLinkedList->removeElements($data, 6);

//$middleNode = $basicLinkedList->middleNode($data);

//print_r($middleNode);

//$basicLinkedList->isPalindrome($data);
//print_r($basicLinkedList->isPalindrome($data));

//$newLinkedList = $basicLinkedList->deleteDuplicates();
//$basicLinkedList->traverse();



