<?php
// Given the head of a singly linked list, reverse the list, and return the reversed list.

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
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $result = null;

        while($head) {
            $tmp = new ListNode($head->val);
            $tmp->next = $result;
            $result = $tmp;
            $head = $head->next;
        }

        return $result;
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


$solution = new Solution();
$head = [1,2,3,4,5];

print_r($solution->reverseList( arrayToLinkedList($head) ), false);
