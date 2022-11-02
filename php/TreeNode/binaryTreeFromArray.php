<?php

// Build Tree From Array

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

function treeFromArray(array &$arr = [], int $pos = 0): ?TreeNode {

    $root = null;
    if($pos < count($arr)) {
        if($arr[$pos] !== null) {
            $root = new TreeNode($arr[$pos]);
            $root->left = treeFromArray($arr, $pos * 2 + 1);
            $root->right = treeFromArray($arr, $pos * 2 + 2);
        }
    }

    return $root;
}

// $arr = [5,4,8,11,null,13,4,7,2,null,null, null, null,5,1];
$arr = [1, 2, 3];

print_r(treeFromArray( $arr ), false);