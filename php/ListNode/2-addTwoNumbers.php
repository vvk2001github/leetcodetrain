<?php

// 2. Add Two Numbers

// You are given two non-empty linked lists representing two non-negative integers. 
// The digits are stored in reverse order, and each of their nodes contains a single digit. 
// Add the two numbers and return the sum as a linked list.

// You may assume the two numbers do not contain any leading zero, 
// except the number 0 itself.

use ListNode as GlobalListNode;

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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $carry = 0;
        $res = new ListNode(0);
        $res_tail = $res;
        while($l1 || $l2 || ($carry > 0)) {
            $x = $l1 ? $l1->val : 0;
            $y = $l2 ? $l2->val : 0;
            $sum = $carry + $x + $y;
            $carry = floor($sum / 10);

            $res_tail->next = new ListNode($sum % 10);

            $l1 = $l1 ? $l1->next : null;
            $l2 = $l2 ? $l2->next : null;

            $res_tail = $res_tail->next;
        }

        if($carry > 0) $res_tail->next = new ListNode($carry);

        return $res->next;
    }
}

$l1 = [2,4,3]; $l2 = [5,6,4];
// $l1 = [9,9,9,9,9,9,9]; $l2 = [9,9,9,9];

$l_l1 = arrayToLinkedList($l1);
$l_l2 = arrayToLinkedList($l2);

$solution = new Solution();

print_r( $solution->addTwoNumbers($l_l1, $l_l2), false);

