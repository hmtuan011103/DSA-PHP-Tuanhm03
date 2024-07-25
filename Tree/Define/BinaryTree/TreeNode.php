<?php

namespace Tree\Define\Binary;

class TreeNode {
    public int $value;
    public mixed $left;
    public mixed $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}