<?php

// 141. Linked List Cycle

// Given head, the head of a linked list, 
// determine if the linked list has a cycle in it.

// There is a cycle in a linked list if there is some node in the list 
// that can be reached again by continuously following the next pointer. 
// Internally, pos is used to denote the index of the node that tail's next pointer is connected to. 
// Note that pos is not passed as a parameter.

// Return true if there is a cycle in the linked list. Otherwise, return false.

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
     * @return Boolean
     */
    function hasCycle($head) {
        if($head === null) return null;
        $node = $head;
        if($node->next === null) return null;

        $nodes = [];
        do {
            $pos = in_array(spl_object_hash($node), $nodes, true);
            if($pos !== false) {
                return true;
            }

            $nodes[] = spl_object_hash($node);
            $node = $node->next;
        } while($node->next !== null);

        return false;
    }
}

$solution = new Solution();


print_r($solution->hasCycle( $head ), false);