<?php

// 105. Construct Binary Tree from Preorder and Inorder Traversal

// Given two integer arrays preorder and inorder 
// where preorder is the preorder traversal of a binary tree 
// and inorder is the inorder traversal of the same tree, 
// construct and return the binary tree.


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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        $countPreorder = count($preorder);
        $countInorder = count($inorder);

        if($countInorder == 0 || $countPreorder == 0) {
            return null;
        }

        $root_value = array_shift($preorder);

        $root = new TreeNode($root_value);
        $mid = array_search($root_value, $inorder);


        $root->left = $this->buildTree(array_slice($preorder, 0, $mid), array_slice($inorder, 0, $mid));

        $root->right = $this->buildTree(array_slice($preorder, $mid), array_slice($inorder, $mid + 1));

        return $root;

    }
}

$preorder = [3,9,20,15,7]; $inorder = [9,3,15,20,7];

$solution = new Solution();

print_r($solution->buildTree( $preorder, $inorder ), false);