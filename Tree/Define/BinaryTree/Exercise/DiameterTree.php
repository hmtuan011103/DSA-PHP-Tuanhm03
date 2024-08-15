<?php

require_once  "../BinarySearchTree.php";

use Tree\Define\BinaryTree\BinarySearchTree;

class DiameterTree {

    private int $diameter = 0;
    public BinarySearchTree $binarySearchTree;

    public function __construct(BinarySearchTree $binarySearchTree)
    {
        $binarySearchTree->insert(6);
        $binarySearchTree->insert(3);
        $binarySearchTree->insert(7);
        $binarySearchTree->insert(2);
        $binarySearchTree->insert(5);
        $this->binarySearchTree = $binarySearchTree;

    }

    public function diameterOfBinaryTree($root): int
    {
        $this->height($root);
        return $this->diameter;
    }

    private function height($node): int
    {
        if ($node === null) {
            return 0;
        }

        $leftHeight = $this->height($node->left);
        $rightHeight = $this->height($node->right);

        $this->diameter = max($this->diameter, $leftHeight + $rightHeight);

        return 1 + max($leftHeight, $rightHeight);
    }
}

$diameterTree = new DiameterTree(new BinarySearchTree);

echo $diameterTree->diameterOfBinaryTree($diameterTree->binarySearchTree->root);

