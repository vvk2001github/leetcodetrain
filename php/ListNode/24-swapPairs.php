<?php

// 24. Swap Nodes in Pairs

// Given a linked list, 
// swap every two adjacent nodes and return its head. 
// You must solve the problem without modifying the values in the list's nodes 
// (i.e., only nodes themselves may be changed.)

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

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head) {
        
        if(!$head) return null;

        if(!$head->next) return $head;

        $second = $head->next;
        $prev = null;

        $result = $second;

        while($head && $second) {
            $third = $second->next;
            $head->next = $third;
            $second->next = $head;
            
            if($prev) $prev->next = $second;
            $prev = $head;

            $head = $third;
            if($third) {
                $second = $third->next;
            } else {
                $second = null;
            }
        }

        $head = $result;

        return $result;
    }
}

$head = [1,2,3,4];

$list_head = arrayToLinkedList($head);

$solution = new Solution();

print_r( $solution->swapPairs($list_head), false);