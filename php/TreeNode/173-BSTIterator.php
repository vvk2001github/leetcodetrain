<?php

// 173

// Implement the BSTIterator class that represents an iterator over the in-order traversal of a binary search tree (BST):

//     BSTIterator(TreeNode root) Initializes an object of the BSTIterator class. 
//     The root of the BST is given as part of the constructor. 
//     The pointer should be initialized to a non-existent number smaller than any element in the BST.
//     boolean hasNext() Returns true if there exists a number in the traversal to the right of the pointer, otherwise returns false.
//     int next() Moves the pointer to the right, then returns the number at the pointer.

// Notice that by initializing the pointer to a non-existent smallest number, the first call to next() will return the smallest element in the BST.

// You may assume that next() calls will always be valid. That is, there will be at least a next number in the in-order traversal when next() is called.

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class BSTIterator {


    private array $stack = [];

    /**
     * @param TreeNode $root
     */
    function __construct($root) {
        while($root) {
            $this->stack[] = $root;
            $root = $root->left;
        }
    }
  
    /**
     * @return Integer
     */
    function next() {
        $curNode = array_pop($this->stack);
        $result = $curNode->val;

        if($curNode->right) {
            $curNode = $curNode->right;
            while($curNode) {
                $this->stack[] = $curNode;
                $curNode = $curNode->left;
            }
        }

        return $result;
    }
  
    /**
     * @return Boolean
     */
    function hasNext() {
        if(count($this->stack) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Your BSTIterator object will be instantiated and called as such:
 * $obj = BSTIterator($root);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */