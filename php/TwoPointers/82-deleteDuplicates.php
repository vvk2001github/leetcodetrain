<?php

// 82. Remove Duplicates from Sorted List II

// Given the head of a sorted linked list, 
// delete all nodes that have duplicate numbers, 
// leaving only distinct numbers from the original list. 
// Return the linked list sorted as well.

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    private function linkedListToArray(ListNode $head) : array {
        if (is_null($head)) return [];
    
        $result = [];
    
        while($head) {
            $result[] = $head->val;
            $head = $head->next;
        }
    
        return $result;
    }

    private function arrayToLinkedList(array $arr): ListNode | null {

        if(empty($arr)) return null;
    
        $result = new ListNode($arr[0]);
        $current = $result;
    
        for($i = 1; $i < count($arr); $i++) {
            $current->next = new ListNode($arr[$i]);
            $current = $current->next;
        }
    
        return $result;
    }

    
    function deleteDuplicates($head) {
        if(!$head) return [];
        
        $nums = $this->linkedListToArray($head);
        $result = [];
        $dub = [];

        $count = count($nums);
        for($i = 0; $i < $count; $i++) {
            $curr = array_shift($nums);
            if(in_array($curr, $nums)) {
                $dub[] = $curr;
                continue;
            };
            if(in_array($curr, $dub)) continue;

            $result[] = $curr;
        }
        
        $result_list = $this->arrayToLinkedList($result);

        return $result_list;
    }
}

// $head = [1,2,3,3,4,4,5];
// $head = [1,1,1,2,3];
// $head = new ListNode

$solution = new Solution();

print_r( $solution->deleteDuplicates($head), false);
