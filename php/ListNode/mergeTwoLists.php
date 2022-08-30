<?php
// You are given the heads of two sorted linked lists list1 and list2.

// Merge the two lists in a one sorted list. 
// The list should be made by splicing together the nodes of the first two lists.

// Return the head of the merged linked list.

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

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        $result = new ListNode();
        $list = $result;
        
        do {
            if ( !$list1 || ($list2 && $list2->val < $list1->val)) {
                $list->next = new ListNode($list2->val);
                $list2 = $list2 -> next;
            } else {
                $list->next = new ListNode($list1->val);
                $list1 = $list1 -> next;
            }

            $list = $list->next;

        } while ($list1 || $list2);


        return $result->next;

    }
}

$solution = new Solution();
$list1 = [1,2,4];
$list2 = [1,3,4];

print_r($solution->mergeTwoLists( $list1, $list1 ), false);
