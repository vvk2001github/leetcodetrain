<?php

// 112. Path Sum

// Given the root of a binary tree and an integer targetSum, 
// return true if the tree has a root-to-leaf path such that adding up all the values along the path equals targetSum.

// A leaf is a node with no children.

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

    private bool $result;
    private int $targetSum;

    private function foo(TreeNode $node,  int $curSum): void {
        if($this->result) return;
        if($node->left) $this->foo($node->left, $curSum + $node->val);
        if($node->right) $this->foo($node->right, $curSum + $node->val);

        if(!$node->left && !$node->right && ($node->val + $curSum == $this->targetSum)) $this->result = true;
    } 
    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum) {
        if(!$root) return false;

        $this->result = false;
        $this->targetSum = $targetSum;

        $this->foo($root, 0);

        return $this->result;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node1->right = $node3;
$node1->left = $node2;

$targetSum = 3;

$solution = new Solution();

print_r($solution->hasPathSum( $node1, $targetSum ), false);