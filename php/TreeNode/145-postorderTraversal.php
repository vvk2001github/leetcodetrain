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
    function postorderTraversal($root) {

        if(!$root) return [];

        $nodeStack = [];
        $result = [];

        array_push($nodeStack, $root);
        $prev = null;

        while(count($nodeStack) > 0) {

            $curr = end($nodeStack);
            if($prev === null || $prev->left === $curr || $prev->right === $curr) {
                if($curr->left) {
                    array_push($nodeStack, $curr->left);
                } elseif($curr->right) {
                    array_push($nodeStack, $curr->right);
                } else {
                    array_pop($nodeStack);
                    $result[] = $curr->val;
                }
            } elseif($curr->left === $prev) {
                if($curr->right !== null) {
                    array_push($nodeStack, $curr->right);
                } else {
                    array_pop($nodeStack);
                    $result[] = $curr->val;
                }
            } elseif($curr->right === $prev) {
                array_pop($nodeStack);
                $result[] = $curr->val;
            }

            $prev = $curr;
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

print_r($solution->postorderTraversal( $node1 ), false);
