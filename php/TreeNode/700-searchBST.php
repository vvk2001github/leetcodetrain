<?php

// 700. Search in a Binary Search Tree

// You are given the root of a binary search tree (BST) and an integer val.

// Find the node in the BST that the node's value equals val 
// and return the subtree rooted with that node. If such a node does not exist, return null.


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

    private TreeNode | null $result = null;
    private int $val;

    private function foo(TreeNode $node): void {
        if($this->result) return;

        if($node->val == $this->val) {
            $this->result = $node;
            return;
        }

        if($this->val < $node->val && $node->left) {
            $this->foo($node->left);
        }

        if($this->val > $node->val && $node->right) {
            $this->foo($node->right);
        }
    }

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function searchBST($root, $val) {
        $this->result = null;
        $this->val = $val;

        $this->foo($root);

        return $this->result;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node7 = new TreeNode(7);
$node4->left = $node2;
$node4->right = $node7;
$node2->left = $node1;
$node2->right = $node3;

$val = 2;

$solution = new Solution();

print_r($solution->searchBST( $node4, $val ), false);
