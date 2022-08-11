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

$head = [1,2,3,4,5];

$tmp = arrayToLinkedList($head);

echo lenOfLinkedList($tmp);

//print_r($tmp, false);
