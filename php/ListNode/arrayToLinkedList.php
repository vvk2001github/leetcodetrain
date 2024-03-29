<?php

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

function linkedListToArray(ListNode $head) : array {
    if (is_null($head)) return [];

    $result = [];

    while($head) {
        $result[] = $head->val;
        $head = $head->next;
    }

    return $result;
}

function posLinkedList(ListNode | null $node, ListNode | null $list): int {
    $i = -1;
    while($list) {
        $i++;
        if($node == $list) break;
        $list = $list->next;
    }
    return $i;
}

function reverseLinkedList(ListNode $head): ListNode {
    if(!$head) return null;

        $prev = null;
        $current = $head;
        while($current) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }
        $head = $prev;
        return $head;
}


$head = [1,2,3,4,5];

$tmp = arrayToLinkedList($head);

echo lenOfLinkedList($tmp);

//print_r($tmp, false);
