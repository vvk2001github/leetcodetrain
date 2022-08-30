<?php

// 19

// Given the head of a linked list, remove the nth node from the end of the list and return its head.

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
     * @param int $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        
        $len = $this->lenOfLinkedList($head);

        if($len == 1 && $n == 1) return [];

        $target = $len - $n;

        if($target == 0 ) return $head->next;

        $result = $head;
        $i = 1;

        while($head) {
            if($i == $target) {
                $head->next = $head->next->next;
                break;
            }
            $i++;
            $head = $head->next;
        }

        return $result;
    }
}


$solution = new Solution();

// $head = [1,2,3,4,5];
// $n = 2;

//$head = [1];$n = 1;
$head = [1,2]; $n = 2;

$list_head = $solution->arrayToLinkedList($head);


print_r( $solution->removeNthFromEnd($list_head, $n), false);
