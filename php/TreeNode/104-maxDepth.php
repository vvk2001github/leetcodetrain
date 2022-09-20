<?php

// 104. Maximum Depth of Binary Tree

// Given the root of a binary tree, 
// return its maximum depth.

// A binary tree's maximum depth is the number of nodes along 
// the longest path from the root node down to the farthest leaf node.

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

    private int $result;

    private function foo(TreeNode | null $node, int $level): void {
        if(!$node) return;
        $this->result = max($level, $this->result);
        if($node->left) $this->foo($node->left, $level + 1);
        if($node->right) $this->foo($node->right, $level + 1);
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        $this->result = 0;
        $this->foo($root, 1);
        return $this->result;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node1->right = $node2;
$node2->left = $node3;

$solution = new Solution();

print_r($solution->maxDepth( $node1 ), false);