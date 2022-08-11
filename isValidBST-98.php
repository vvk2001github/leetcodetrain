<?php

// 98

// Given the root of a binary tree, determine if it is a valid binary search tree (BST).

// A valid BST is defined as follows:

//     The left subtree of a node contains only nodes with keys less than the node's key.
//     The right subtree of a node contains only nodes with keys greater than the node's key.
//     Both the left and right subtrees must also be binary search trees.

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

class Solution {

    private $result = true;

    function doit(TreeNode | null $root, int $min, $max): void {
        
        if($this->result === false) return;

        if($root === null) return;

        if($root->val <= $min || $root->val >= $max) {
            $this->result = false;
            return;
        }
        
        $this->doit($root->left, $min, $root->val);
        $this->doit($root->right, $root->val, $max);
        
    }

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
        $this->doit($root, PHP_INT_MIN, PHP_INT_MAX);
        return $this->result;
    }
}

// $node1 = new TreeNode(1);
// $node2 = new TreeNode(2);
// $node3 = new TreeNode(3);

// $node2->left = $node1;
// $node2->right = $node3;



// $node1 = new TreeNode(1);
// $node3 = new TreeNode(3);
// $node4 = new TreeNode(4);
// $node5 = new TreeNode(5);
// $node6 = new TreeNode(6);

// $node5->left = $node1;
// $node5->right = $node4;
// $node4->left = $node3;
// $node4->right = $node6;



// $node1 = new TreeNode(2);
// $node2 = new TreeNode(2);
// $node3 = new TreeNode(2);

// $node2->left = $node1;
// $node2->right = $node3;


$solution = new Solution();

print_r($solution->isValidBST( $node2 ), false);