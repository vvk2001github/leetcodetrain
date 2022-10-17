<?php

// 25. Reverse Nodes in k-Group

// Given the head of a linked list, reverse the nodes of the list k at a time, 
// and return the modified list.

// k is a positive integer and is less than or equal to the length of the linked list. 
// If the number of nodes is not a multiple of k then left-out nodes, in the end, should remain as it is.

// You may not alter the values in the list's nodes, only nodes themselves may be changed.

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
     * @param int $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        $arrayList = [];
        $tmpHead = $head;
        $lenList = 0;

        while($tmpHead) {
            $arrayList[] = $tmpHead;
            $tmpHead = $tmpHead->next;
            $lenList++;
        }

        if($lenList < $k) return $head;

        if($lenList == $k) {
            $arrayList = array_reverse($arrayList, false);
            for($i = 0; $i < ($k - 1); $i++) {
                $arrayList[$i]->next = $arrayList[$i + 1];
            };
            $arrayList[$lenList - 1]->next = null;
            $head = $arrayList[0];
            return $head;
        }

        $tmpHead = $arrayList[$k - 1];
        $prev = null;

        $count = 0;
        $countCicle = floor($lenList / $k);
        while($count < $countCicle) {
            $tmpArr = [];
            
            for($i = ($count * $k); $i < ($count * $k + $k); $i++) {
                $tmpArr[] = $arrayList[$i];
            }
            
            $tmpArr = array_reverse($tmpArr, false);

            for($i = 0; $i < ($k - 1); $i++) {
                $tmpArr[$i]->next = $tmpArr[$i + 1];
            }

            if(isset($arrayList[$count * $k + $k])) {
                $tmpArr[$k - 1]->next = $arrayList[$count * $k + $k ];
            } else {
                $tmpArr[$k - 1]->next = null;
            }

            if($prev) $prev->next = $tmpArr[0];
            $prev = $tmpArr[$k - 1];

            $count++;
        }

        return $tmpHead;
    }
}

// $head = [1,2,3,4,5]; $k = 3;
$head = [1,2, 3, 4]; $k = 2;

$list_head = arrayToLinkedList($head);

$solution = new Solution();

print_r( $solution->reverseKGroup($list_head, $k), false);