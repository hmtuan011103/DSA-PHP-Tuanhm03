<?php

namespace Tree\Define\TernaryTree;

class TernaryNode
{
    public int $value;
    public mixed $left;
    public mixed $middle;
    public mixed $right;

    public function __construct(int $value) {
        $this->value = $value;
        $this->left = null;
        $this->middle = null;
        $this->right = null;
    }
}