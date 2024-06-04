<?php

require '../Node.php';
use LinkedList\Single\Node;

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

    public function traverse(): void
    {
        $current = $this->head;

        while ($current !== null)
        {
            echo $current->data . " ";

            $current = $current->next;
        }

        echo "\nEnd";
    }
}

$basicLinkedList = new BasicLinkedList();

$basicLinkedList->insert(1);
$basicLinkedList->insert(2);
$basicLinkedList->insert(3);

$basicLinkedList->traverse();



