<?php

// 144. Binary Tree Preorder Traversal

// Given the root of a binary tree, return the preorder traversal of its nodes' values.

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {

        if(!$root) return [];

        $nodeStack = [];
        $result = [];
        array_push($nodeStack, $root);
        while(count($nodeStack) > 0) {
            $node = array_pop($nodeStack);
            $result[] = $node->val;
            if($node->right) array_push($nodeStack, $node->right);
            if($node->left) array_push($nodeStack, $node->left);
        }

        return $result;
    }
}