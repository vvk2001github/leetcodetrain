<?php

// 236. Lowest Common Ancestor of a Binary Tree

// Given a binary tree, find the lowest common ancestor (LCA) of two given nodes in the tree.

// According to the definition of LCA on Wikipedia: 
// “The lowest common ancestor is defined between two nodes p and q 
// as the lowest node in T that has both p and q as descendants 
// (where we allow a node to be a descendant of itself).”

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

function treeFromArray2(array &$arr): ?TreeNode {

    $queue = new SplQueue();
    $pos = 0;
    $next = $arr[$pos++];
    $queue->enqueue(new TreeNode($next));
    $root = null;

    while(!$queue->isEmpty()) {
        $tree = $queue->dequeue();

        if(is_null($root)) {
            $root = $tree;
        }

        $next = $arr[$pos++] ?? null;

        if($next !== null){
            $tree->left = new TreeNode($next);
            $queue->enqueue($tree->left);
        } else {
            $tree->left = null;
        }
        
        $next = $arr[$pos++] ?? null;
        
        if($next !== null){
            $tree->right = new TreeNode($next);
            $queue->enqueue($tree->right);
        } else {
            $tree->right = null;
        }
    }

    return $root;
}

class Solution {

    private array $path1;
    private array $path2;

    private function findPath(?TreeNode $root, int $n, array &$path): bool {
        if($root === null) {
            return false;
        }

        $path[] = $root;

        if($root->val == $n) {
            return true;
        }

        if($root->left !== null && $this->findPath($root->left, $n, $path)) {
            return true;
        }

        if($root->right !== null && $this->findPath($root->right, $n, $path)) {
            return true;
        }

        array_pop($path);
        return false;
    }


    private function findLCA(?TreeNode $root, int $n1, int $n2): ?TreeNode {
        if(!$this->findPath($root, $n1, $this->path1) || !$this->findPath($root, $n2, $this->path2)) {
            return null;
        }

        for($i = 0; $i < count($this->path1) && $i < count($this->path2); $i++) {
            if($this->path1[$i]->val != $this->path2[$i]->val) 
                break;
        }

        return $this->path1[$i - 1];
    }

    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        $this->path1 = [];
        $this->path2 = [];
        return $this->findLCA($root, $p->val,  $q->val);
    }
}

$arr = [3,5,1,6,2,0,8,null,null,7,4]; $p = 5; $q = 1;
// $arr = [1,2]; $p = 1; $q = 2;
$root = treeFromArray2($arr);

$solution = new Solution();

print_r($solution->lowestCommonAncestor( $root, new TreeNode($p), new TreeNode($q) ), false);