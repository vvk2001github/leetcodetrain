<?php

// 155. Min Stack

// Design a stack that supports push, pop, top, and retrieving the minimum element in constant time.

// Implement the MinStack class:

//     MinStack() initializes the stack object.
//     void push(int val) pushes the element val onto the stack.
//     void pop() removes the element on the top of the stack.
//     int top() gets the top element of the stack.
//     int getMin() retrieves the minimum element in the stack.

// You must implement a solution with O(1) time complexity for each function.

class MinStack {

    private array $stack;
    /**
     */
    function __construct() {
        $this->stack = [];
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        array_push($this->stack, $val);
    }
  
    /**
     * @return NULL
     */
    function pop() {
        return array_pop($this->stack);
    }
  
    /**
     * @return Integer
     */
    function top() {
        $count = count($this->stack);
        return $this->stack[$count - 1];
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        $min = min($this->stack);
        $index = array_search($min, $this->stack);
        if($index !== false) {
            return $this->stack[$index];
        } else {
            return null;
        }
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

$minStack = new MinStack();