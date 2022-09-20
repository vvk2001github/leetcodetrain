<?php

// 94. Binary Tree Inorder Traversal

// Given the root of a binary tree, return the inorder traversal of its nodes' values.


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
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {

        if(!$root) return [];

        $nodeStack = [];
        $result = [];
        $curr = $root;

        while ($curr || count($nodeStack) > 0) {

            while($curr) {
                array_push($nodeStack, $curr);
                $curr = $curr->left;
            }

            $curr = array_pop($nodeStack);
            $result[] = $curr->val;
            $curr = $curr->right;
        }
        
        return $result;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node1->right = $node2;
$node2->left = $node3;

$solution = new Solution();

print_r($solution->inorderTraversal( $node1 ), false);
