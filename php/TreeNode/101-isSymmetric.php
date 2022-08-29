<?php

// 101

// Given the root of a binary tree, check whether it is a mirror of itself (i.e., symmetric around its center).

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

    private array $arr;

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

    private function treeToArray(TreeNode | null $node): void {
        if(is_null($node)) return;
        $this->arr[] = $node->val;
        $this->arr[] = $node->left;
        $this->arr[] = $node->right;
        $this->treeToArray($node->left);
        $this->treeToArray($node->right);
    }


    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        $left = $root->left;
        $right = $this->invertTree($root->right);

        $this->arr = [];
        $this->treeToArray($left);
        $a = $this->arr;

        $this->arr = [];
        $this->treeToArray($right);

        return ($this->arr == $a);
    }
}

$solution = new Solution();

print_r($solution->isSymmetric( $node1 ), false);