<?php

namespace Tree\Define\BTree;

class BTreeNode {
    public array $keys = [];
    public array $children = [];
    public mixed $leaf = true;
    public int $n = 0; // Number of keys

    public function __construct($leaf = true) {
        $this->leaf = $leaf;
    }
}