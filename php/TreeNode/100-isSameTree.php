<?php

// 100

// Given the roots of two binary trees p and q, write a function to check if they are the same or not.

// Two binary trees are considered the same if they are structurally identical, and the nodes have the same value.

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

    private function helper(TreeNode | null $node): void {
        if(is_null($node)) return;
        $this->arr[] = $node->val;
        $this->arr[] = $node->left;
        $this->arr[] = $node->right;
        $this->helper($node->left);
        $this->helper($node->right);
    }

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        $this->arr = [];
        
        $this->helper($p);
        $arr1 = $this->arr;
        
        $this->arr = [];
        $this->helper($q);

        return ($this->arr == $arr1);


    }
}

$solution = new Solution();

print_r($solution->isSameTree( $node1 ), false);
