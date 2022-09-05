<?php

// 199. Binary Tree Right Side View

// Given the root of a binary tree, 
// imagine yourself standing on the right side of it, 
// return the values of the nodes you can see ordered from top to bottom.


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

    private function doit(TreeNode | null $node, array &$arr, int $level = 0): void {
        if($node === null) return;
        if(!isset($arr[$level])) $arr[$level] = $node->val;
        if($node->right !== null) $this->doit($node->right, $arr, $level + 1);
        if($node->left !== null) $this->doit($node->left, $arr, $level + 1);
    }

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root) {
        if($root === null) return [];
        $result = [];
        $this->doit($root, $result);
        return $result;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);

$node1->left = $node2;
$node1->right = $node3;
$node2->right = $node5;
$node3->right = $node4;

$solution = new Solution();

print_r($solution->rightSideView( $node1 ), false);