<?php

// 110

// Given a binary tree, determine if it is height-balanced.

// For this problem, a height-balanced binary tree is defined as:

//     a binary tree in which the left and right subtrees of every node differ in height by no more than 1.

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

    private function hightTreeNode(TreeNode | null $node): int {

        if(is_null($node)) return 0;

        $left_h = 0;
        $right_h = 0;
        if(!is_null($node->left)) $left_h = $this->hightTreeNode($node->left) + 1;
        if(!is_null($node->right)) $right_h = $this->hightTreeNode($node->right) + 1;

        return max($left_h, $right_h);
    }

    private function doit($node) {

        if(!$this->result) return;

        $left_h = $this->hightTreeNode($node->left);
        $right_h = $this->hightTreeNode($node->right);

        if( abs( $left_h - $right_h) > 1 ) {
            $this->result = false;
            return;
        }

        if(!is_null($node->left)) $this->doit($node->left);
        if(!is_null($node->right)) $this->doit($node->right);
    }

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        if(is_null($root)) return true;

        $this->doit($root);

        return $this->result;
    }
}

$node3 = new TreeNode(3);
$node9 = new TreeNode(9);
$node20 = new TreeNode(20);
$node15 = new TreeNode(15);
$node7 = new TreeNode(7);

$node3->left = $node9;
$node3->right = $node20;

$node20->left = $node15;
$node20->right = $node7;

$solution = new Solution();

print_r($solution->isBalanced( $node3 ), false);
