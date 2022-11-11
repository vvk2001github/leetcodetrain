<?php

// 61. Rotate List

// Given the head of a linked list, rotate the list to the right by k places.

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

    private function linkedListToArray(?ListNode $head) : array {
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

    /**
     * @param ListNode $head
     * @param int $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        $arr = $this->linkedListToArray($head);

        if(count($arr) == 0) return null;

        $count = $k % count($arr);

        for($i = 0; $i < $count; $i++) {
            $val = array_pop($arr);
            array_unshift($arr, $val);
        }
        $head = $this->arrayToLinkedList($arr);

        return $head;
    }
}

$solution = new Solution();

$arr = [1,2,3,4,5]; $k = 2;
// $arr = [0,1,2]; $k = 4;

$head = arrayToLinkedList($arr);

print_r( $solution->rotateRight($head, $k), false);