<?php

// 328

// Given the head of a singly linked list, 
// group all the nodes with odd indices together followed by the nodes with even indices, 
// and return the reordered list.

// The first node is considered odd, and the second node is even, and so on.

// Note that the relative order inside both the even and odd groups should remain as it was in the input.

// You must solve the problem in O(1) extra space complexity and O(n) time complexity.

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
     * @return ListNode
     */
    function oddEvenList($head) {

        if(is_null($head)) return [];

        $odd = null;
        $even = null;
        $begin_even = null;
        $begin_odd = null;

        $i = 1;

        while($head) {
            if($i % 2 == 1) {

                if(is_null($odd)) {
                    $odd = new ListNode($head->val);
                    $begin_odd = $odd;
                    $head = $head->next;
                    $i++;
                    continue;
                }

                $odd->next = new ListNode($head->val);
                $odd = $odd->next;
            } else {

                if(is_null($even)) {
                    $even = new ListNode($head->val);
                    $begin_even = $even;
                    $head = $head->next;
                    $i++;
                    continue;
                }

                $even->next = new ListNode($head->val);
                $even = $even->next;
            }
            $head = $head->next;
            $i++;
        }

        $odd->next = $begin_even;
        return $begin_odd;
    }
}

// $head = [1,2,3,4,5];
$head = [2,1,3,5,6,4,7];

$solution = new Solution();

$list_head = $solution->arrayToLinkedList($head);

print_r( $solution->oddEvenList($list_head), false);
