<?php

// 203. Remove Linked List Elements

// Given the head of a linked list and an integer val, 
// remove all the nodes of the linked list that has Node.val == val, 
// and return the new head.

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

    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val) {
        if(is_null($head)) return [];
        
        while($head && $head->val == $val) {
            $head = $head->next;
        }

        $result = $head;

        while($head) {
            if($head->next && $head->next->val == $val) {
                $head->next = $head->next->next;
                continue;
            }
            $head = $head->next;
        }

        return $result;
    }
}

// $head = [1,2,6,3,4,5,6]; $val = 6;
$head = [7, 7, 7, 7]; $val = 7;
$head = [1, 2, 2, 1]; $val = 2;

$solution = new Solution();
$node = $solution->arrayToLinkedList($head);

print_r($solution->removeElements( $node, $val ), false);