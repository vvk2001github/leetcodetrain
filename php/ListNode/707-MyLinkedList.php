<?php

// 707. Design Linked List

class ListNode {

    function __construct(public int $val = 0, public ListNode | null $next = null, public ListNode | null $prev = null) {
        //
    }
}

class MyLinkedList {

    private ?ListNode $list = null;
    private int $length = 0;
    
    /**
     */
    function __construct() {
        
    }
  
    /**
     * @param int $index
     * @return Integer
     */
    function get($index) {
        if($index < 0 || $index >= $this->length) return -1;

        $tmpIndex = 0;
        $tmpHead = $this->list;
        while($tmpIndex < $index) {
            $tmpHead = $tmpHead->next;
            $tmpIndex++;
        };

        return $tmpHead->val;
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtHead($val) {
        if(!$this->list) {
            $this->list = new ListNode(val: $val);
        } else {
            $newNode = new ListNode(val: $val, next: $this->list);
            $this->list->prev = $newNode;
            $this->list = $newNode;
        }
        $this->length++;
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtTail($val) {
        if(!$this->list) {
            $this->list = new ListNode(val: $val);
        } else {
            $tmpHead = $this->list;
            while($tmpHead->next) $tmpHead = $tmpHead->next;
            $tmpHead->next = new ListNode(val: $val, prev: $tmpHead);
        }
        $this->length++;
    }
  
    /**
     * @param int $index
     * @param Integer $val
     * @return NULL
     */
    function addAtIndex($index, $val) {
        if($this->length == $index) {
            $this->addAtTail($val);
            return;
        };

        if($index == 0) {
            $this->addAtHead($val);
            return;
        };

        if($this->length < $index) return;

        $tmpIndex = 0;
        $tmpHead = $this->list;
        while($tmpIndex < ($index - 1)) {
            $tmpHead = $tmpHead->next;
            $tmpIndex++;
        };
        $newNode = new ListNode(val: $val, next: $tmpHead->next, prev: $tmpHead);
        $tmpHead->next->prev = $newNode;
        $tmpHead->next = $newNode;

        $this->length++;
    }
  
    /**
     * @param int $index
     * @return NULL
     */
    function deleteAtIndex($index) {
        if($index < 0 || $index >= $this->length) return;

        if($index == 0) {
            $tmpHead = $this->list;
            $this->list = $this->list->next;
            if($this->list) $this->list->prev = null;
            $tmpHead = null;
            $this->length--;
            return;
        }

        $tmpIndex = 0;
        $tmpHead = $this->list;
        while($tmpIndex < ($index - 1)) {
            $tmpHead = $tmpHead->next;
            $tmpIndex++;
        };

        $toDelete = $tmpHead->next;
        $toDeleteNext = $toDelete->next;
        // $toDeletePrev = $toDelete->prev;

        $tmpHead->next = $toDeleteNext;
        if($toDeleteNext) $toDeleteNext->prev = $tmpHead;
        $toDelete = null;

        $this->length--;
    }
}

/**
 * Your MyLinkedList object will be instantiated and called as such:
 * $obj = MyLinkedList();
 * $ret_1 = $obj->get($index);
 * $obj->addAtHead($val);
 * $obj->addAtTail($val);
 * $obj->addAtIndex($index, $val);
 * $obj->deleteAtIndex($index);
 */

$myLinkedList = new MyLinkedList();

$myLinkedList->addAtHead(1);
$myLinkedList->deleteAtIndex(0);