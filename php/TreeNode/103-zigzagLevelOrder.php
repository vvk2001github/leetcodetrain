<?php

// 103. Binary Tree Zigzag Level Order Traversal


// Given the root of a binary tree, 
// return the zigzag level order traversal of its nodes' values. 
// (i.e., from left to right, then right to left for the next level and alternate between).

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

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {
        
    }
}

$node3 = new Node(3);
$node9 = new Node(9);
$node20 = new Node(20);
$node15 = new Node(15);
$node7 = new Node(7);

$node3->left = $node9;
$node3->right = $node20;

$node20->left = $node15;
$node20->right = $node7;