<?php

// 232

// Implement a first in first out (FIFO) queue using only two stacks. 
// The implemented queue should support all the functions of a normal queue (push, peek, pop, and empty).

// Implement the MyQueue class:

//     void push(int x) Pushes element x to the back of the queue.
//     int pop() Removes the element from the front of the queue and returns it.
//     int peek() Returns the element at the front of the queue.
//     boolean empty() Returns true if the queue is empty, false otherwise.

// Notes:

//     You must use only standard operations of a stack, which means only push to top, peek/pop from top, size, and is empty operations are valid.
//     Depending on your language, the stack may not be supported natively. 
//     You may simulate a stack using a list or deque (double-ended queue) as long as you use only a stack's standard operations.

class MyQueue {

    public array $queue = [];
    /**
     */
    function __construct() {
        
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        array_push($this->queue, $x);
    }
  
    /**
     * @return Integer
     */
    function pop() {
        $result = $this->queue[0];
        unset($this->queue[0]);
        $this->queue = array_values($this->queue);
        return $result;
    }
  
    /**
     * @return Integer
     */
    function peek() {
        return $this->queue[0];
    }
  
    /**
     * @return Boolean
     */
    function empty() {
        return (count($this->queue) == 0);
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */

$myQueue = new MyQueue();
$myQueue->push(1);
$myQueue->push(2);


print_r( $myQueue->pop(), false);
print_r( $myQueue->queue, false);