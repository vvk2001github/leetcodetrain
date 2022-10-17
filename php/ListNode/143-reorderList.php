<?php

// 143. Reorder List

// You are given the head of a singly linked-list. The list can be represented as:

// L0 → L1 → … → Ln - 1 → Ln

// Reorder the list to be on the following form:

// L0 → Ln → L1 → Ln - 1 → L2 → Ln - 2 → …

// You may not modify the values in the list's nodes. Only nodes themselves may be changed.

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
     * @return NULL
     */
    function reorderList($head) {
        $array = [];
        $lenList = 0;
        $left = 0;

        while($head) {
            $array[] = $head;
            $lenList++;
            $head = $head->next;
        }
        $head = $array[0];

        $right = $lenList - 1;

        while($left <= $right) {
            $array[$left]->next = $array[$right];

            if ($left + 1 === $right || $left === $right) {
                $array[$right]->next = null;
            } else {
                $array[$right]->next = $array[$left + 1];
            }

            $left++;
            $right--;
        }

        $array[$left] = null;

        return $head;
    }
}

// $head = [1,2,3,4,5];
$head = [1,2,3,4];

$list_head = arrayToLinkedList($head);

$solution = new Solution();

print_r( $solution->reorderList($list_head), false);
