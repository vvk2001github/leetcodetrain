<?php

// 83. Remove Duplicates from Sorted List

// Given the head of a sorted linked list, delete all duplicates such that each element appears only once. Return the linked list sorted as well.

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
     * @return ListNode
     */
    function deleteDuplicates($head) {
        if($head == null) return null;
        $arr = $this->linkedListToArray($head);
        $result = [];
        $count = count($arr);
        for($i = 0; $i < $count; $i++) {
            if(!in_array($arr[$i], $result)) $result[] = $arr[$i];
        }
        $result_list = $this->arrayToLinkedList($result);
        return $result_list;
    }
}

$solution = new Solution();

$head = [1,1,2,3,3];

$list = $solution->arrayToLinkedList($head);

print_r( $solution->deleteDuplicates($list), false);