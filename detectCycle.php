<?php
// Given the head of a linked list, return the node where the cycle begins. 
// If there is no cycle, return null.

// There is a cycle in a linked list if there is some node in the list 
// that can be reached again by continuously following the next pointer. 
// Internally, pos is used to denote the index of the node that tail's next pointer is connected to (0-indexed). 
// It is -1 if there is no cycle. Note that pos is not passed as a parameter.

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
    function detectCycle($head) {
        if($head === null) return null;
        $node = $head;
        if($node->next === null) return null;

        $nodes = [];
        do {
            $pos = in_array(spl_object_hash($node), $nodes, true);
            if($pos !== false) {
                $node->next = null;
                return $node;
            }

            $nodes[] = spl_object_hash($node);
            $node = $node->next;
        } while($node->next !== null);

        return null;
    }
}

$head = new ListNode(3);
$head->next = new ListNode(2);

$tmp = $head->next;

$head->next->next = new ListNode(0);
$head->next->next->next = new ListNode(-4);
$head->next->next->next->next = $tmp;
// $head = new ListNode(1);
// $head->next = new ListNode(2);
// $head->next->next = $head;

$solution = new Solution();


print_r($solution->detectCycle( $head ), false);