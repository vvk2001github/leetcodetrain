<?php

// 160. Intersection of Two Linked Lists

// Given the heads of two singly linked-lists headA and headB, 
// return the node at which the two lists intersect. 
// If the two linked lists have no intersection at all, return null.
// For example, the following two linked lists begin to intersect at node c1:

// The test cases are generated such that there are no cycles anywhere in the entire linked structure.

// Note that the linked lists must retain their original structure after the function returns.

// Custom Judge:

// The inputs to the judge are given as follows (your program is not given these inputs):

//     intersectVal - The value of the node where the intersection occurs. This is 0 if there is no intersected node.
//     listA - The first linked list.
//     listB - The second linked list.
//     skipA - The number of nodes to skip ahead in listA (starting from the head) to get to the intersected node.
//     skipB - The number of nodes to skip ahead in listB (starting from the head) to get to the intersected node.

// The judge will then create the linked structure based on these inputs and pass the two heads, 
// headA and headB to your program. If you correctly return the intersected node, then your solution will be accepted.

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

    private function lenOfLinkedList(ListNode | null $arr): int {
        $result = 0;
    
        while($arr) {
            $arr = $arr->next;
            $result++;
        }
    
        return $result;
    }
    

    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB) {
        $lenA = $this->lenOfLinkedList($headA);
        $lenB = $this->lenOfLinkedList($headB);

        $result = null;

        if($lenA > $lenB) [$headA, $headB] = [$headB, $headA];

        for($i =0; $i < abs($lenA - $lenB); $i++) $headB = $headB->next;

        while($headA && $headB) {
            if($headA === $headB) {
                $result = $headA;
                break;
            }

            $headA = $headA->next;
            $headB = $headB->next;
        }

        return $result;
    }
}

// $listA = [4,1,8,4,5]; $listB = [5,6,1,8,4,5];

$listC = new ListNode(8);
$listC->next = new ListNode(4);
$listC->next->next = new ListNode(5);

$listA = new ListNode(4);
$listA->next = new ListNode(1);
$listA->next->next = $listC;

$listB = new ListNode(5);
$listB->next = new ListNode(6);
$listB->next->next = new ListNode(1);
$listB->next->next->next = $listC;

// print_r( $listB, false);

$solution = new Solution();

print_r( $solution->getIntersectionNode($listA, $listB), false);
