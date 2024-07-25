<?php
class ListNode {
    public mixed $val = 0;
    public mixed $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function SolutionFirst($head): bool
{
    $stack = [];
    $current = $head;

    while ($current !== null) {
        $stack[] = $current->val;
        $current = $current->next;
    }

    $current = $head;

    while ($current !== null) {
        if (array_pop($stack) !== $current->val) {
            return false;
        }
        $current = $current->next;
    }

    return true;
}

function SolutionSecond($head): bool
{
    if ($head == null || $head->next == null) {
        return true;
    }

    $slow = $head;
    $fast = $head;
    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    $prev = null;
    while ($slow !== null) {
        $nextNode = $slow->next;
        $slow->next = $prev;
        $prev = $slow;
        $slow = $nextNode;
    }

    $firstHalf = $head;
    $secondHalf = $prev;
    while ($secondHalf !== null) {
        if ($firstHalf->val !== $secondHalf->val) {
            return false;
        }
        $firstHalf = $firstHalf->next;
        $secondHalf = $secondHalf->next;
    }

    return true;
}

$node4 = new ListNode(1);
$node3 = new ListNode(2, $node4);
$node2 = new ListNode(2, $node3);
$head = new ListNode(1, $node2);


echo SolutionFirst($head) ? "True \n" : "False"; // Output: True
echo SolutionSecond($head) ? "True \n" : "False"; // Output: True
