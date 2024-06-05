<?php

use LinkedList\Single\Node;

require '../Node.php';

class BasicLinkedList
{
    private $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function insert($data): void
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
    }

    /**
     * @return Node|null
     */
    public function deleteDuplicates(): ?Node
    {
        $current = $this->head->next;
        $prev    = $this->head;

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

$newLinkedList = $basicLinkedList->deleteDuplicates();
print_r($newLinkedList);
$basicLinkedList->traverse();



