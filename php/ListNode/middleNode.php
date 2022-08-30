<?php
// Given the head of a singly linked list, return the middle node of the linked list.

// If there are two middle nodes, return the second middle node.

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}


function arrayToLinkedList(array $arr): ListNode | null {

    if(empty($arr)) return null;

    $result = new ListNode($arr[0]);
    $current = $result;

    for($i = 1; $i < count($arr); $i++) {
        $current->next = new ListNode($arr[$i]);
        $current = $current->next;
    }

    return $result;
}

function lenOfLinkedList(ListNode | null $arr): int {
    $result = 0;

    while($arr) {
        $arr = $arr->next;
        $result++;
    }

    return $result;
}

function partOfLinkedList(ListNode | null $head, int $num): ListNode | null {
    if(empty($head)) return null;
    $result = $head;
    for($i = 0; $i < $num; $i++) {
        $result = $result->next;
        if(is_null($result)) return null;
    }
    return $result;
}


class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head) {
        $count = lenOfLinkedList($head);
        return partOfLinkedList($head, (int)($count / 2));
    }
}


$head = [1,2,3,4,5];

$solution = new Solution();

print_r($solution->middleNode( arrayToLinkedList($head) ), false);

