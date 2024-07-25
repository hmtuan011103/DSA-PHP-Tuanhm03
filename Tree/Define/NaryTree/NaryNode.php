<?php

namespace Tree\Define\NaryTree;

class NaryNode
{
    public int $value;
    public array $children;

    public function __construct(int $value) {
        $this->value = $value;
        $this->children = [];
    }
}