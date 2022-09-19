<?php

// 144. Binary Tree Preorder Traversal

// Given the root of a binary tree, return the preorder traversal of its nodes' values.

class Solution {

    private array $result;

    private function foo($root) {
        if(!$root) return;
        $this->result[] = $root->val;
        $this->foo($root->left);
        $this->foo($root->right);
    }

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $this->result = [];
        $this->foo($root);
        return $this->result;
    }
}