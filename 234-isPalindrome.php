<?php

// 234

// Given the head of a singly linked list, 
// return true if it is a palindrome or false otherwise.

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

    private function lenOfLinkedList(ListNode | null $arr): int {
        $result = 0;
    
        while($arr) {
            $arr = $arr->next;
            $result++;
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
     * @return Boolean
     */
    function isPalindrome($head) {
        $len = $this->lenOfLinkedList($head);

        $i = 0;
        $median = floor($len / 2);

        $tmp = false;

        if($len % 2 == 1) {
            $tmp = true;
        }

        $arr1 = [];
        $arr2 = [];

        while($head) {
            if($i < $median) {
                $arr1[] = $head->val;
            } else {
                $arr2[] = $head->val;
            }
            if($tmp && $i == $median) $arr1[] = $head->val;
            $i++;
            $head = $head->next;
        }

        $arr3 = array_reverse($arr2);

        if($arr1 === $arr3){
            return true;
        } else {
            return false;
        }

    }
}

// $head = [1,2,2,1];
//$head = [1,2];
//$head = [1];
$head = [1,2,3,2,1];

$solution = new Solution();

$list_head = $solution->arrayToLinkedList($head);

print_r( $solution->isPalindrome($list_head), false);
