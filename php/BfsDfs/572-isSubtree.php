<?php


// 572. Subtree of Another Tree

// Given the roots of two binary trees root and subRoot, 
// return true if there is a subtree of root with the same structure 
// and node values of subRoot and false otherwise.

// A subtree of a binary tree tree is a tree 
// that consists of a node in tree and all of this node's descendants. 
// The tree tree could also be considered as a subtree of itself.

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

    private function equalTree(?TreeNode $tree1, ?TreeNode $tree2): bool {
        if(!$tree1 && !$tree2) {
            return true;
        } elseif (!$tree1 || !$tree2) {
            return false;
        } else {
            return ( ($tree1->val == $tree2->val) && ($this->equalTree($tree1->right, $tree2->right)) && ($this->equalTree($tree1->left, $tree2->left)));
        }
    }

    /**
     * @param TreeNode $root
     * @param TreeNode $subRoot
     * @return Boolean
     */
    function isSubtree($root, $subRoot) {
        if(!$root) {
            return false;
        } elseif($this->equalTree($root, $subRoot)) {
            return true;
        } else {
            return $this->isSubtree($root->left, $subRoot) || $this->isSubtree($root->right, $subRoot);
        }


    }
}

$root = [3,4,5,1,2]; $subRoot = [4,1,2];

$solution = new Solution();

print_r( $solution->isSubtree($n, $trust), false);
