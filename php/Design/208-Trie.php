<?php

// 208. Implement Trie (Prefix Tree)

// A trie (pronounced as "try") or prefix tree is a tree data structure used to efficiently store and retrieve keys in a dataset of strings. 
// There are various applications of this data structure, such as autocomplete and spellchecker.

// Implement the Trie class:

//     Trie() Initializes the trie object.
//     void insert(String word) Inserts the string word into the trie.
//     boolean search(String word) Returns true if the string word is in the trie (i.e., was inserted before), and false otherwise.
//     boolean startsWith(String prefix) Returns true if there is a previously inserted string word that has the prefix prefix, and false otherwise.


class Trie {

    private array $arr;
    /**
     */
    function __construct() {
        $this->arr = [];
    }
  
    /**
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        array_push($this->arr, $word);
    }
  
    /**
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        foreach($this->arr as $value) {
            if($value == $word) return true;
        }
        return false;
    }
  
    /**
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        foreach($this->arr as $value) {
            if(str_starts_with($value, $prefix)) return true;
        }
        return false;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */