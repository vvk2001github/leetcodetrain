<?php

// 226

// Given the root of a binary tree, invert the tree, and return its root.

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

    private function doit($node) {
        $tmp = $node->left;
        $node->left = $node->right;
        $node->right = $tmp;

        if(!is_null($node->left)) $this->doit($node->left);
        if(!is_null($node->right)) $this->doit($node->right);
    }

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {

        if(is_null($root)) return null;

        $this->doit($root);
        return $root;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node6 = new TreeNode(6);
$node7 = new TreeNode(7);
$node9 = new TreeNode(9);

$node4->left = $node2;
$node4->right = $node7;

$node2->left = $node1;
$node2->right = $node3;

$node7->left = $node6;
$node7->right = $node9;

$solution = new Solution();

print_r($solution->invertTree( $node4 ), false);
