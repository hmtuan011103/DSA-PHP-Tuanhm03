<?php

class BasicLinkedList
{
    public int $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function traverseLinkedList($head): void
    {
        $current = $head;

        while ($current !== null)
        {
            echo $current->data . " ";

            $current = $current->next;
        }

        echo "\nEnd";
    }
}

$linkedListFirst = new BasicLinkedList(1);
$linkedListSecond = new BasicLinkedList(2);
$linkedListThree = new BasicLinkedList(3);

$linkedListFirst->next = $linkedListSecond;
print_r($linkedListFirst);
$linkedListSecond->next = $linkedListThree;
print_r($linkedListSecond);


$linkedListFirst->traverseLinkedList($linkedListFirst);



