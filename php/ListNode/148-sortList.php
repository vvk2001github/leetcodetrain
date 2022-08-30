<?php

// 148

// Given the head of a linked list, return the list after sorting it in ascending order.



class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    public function arrayToLinkedList(array $arr): ListNode | null {

        if(empty($arr)) return null;
    
        $result = new ListNode($arr[0]);
        $current = $result;
    
        for($i = 1; $i < count($arr); $i++) {
            $current->next = new ListNode($arr[$i]);
            $current = $current->next;
        }
    
        return $result;
    }

    public function linkedListToArray(ListNode $head) : array {
        if (is_null($head)) return [];

        $result = [];

        while($head) {
            $result[] = $head->val;
            $head = $head->next;
        }

        return $result;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function sortList($head) {
        
        if (is_null($head)) return null;

        $arr = $this->linkedListToArray($head);
        sort($arr);

        return $this->arrayToLinkedList($arr);
    }
}

$head = [4,2,1,3];

$solution = new Solution();

$list_head = $solution->arrayToLinkedList($head);

print_r( $solution->sortList($list_head), false);
