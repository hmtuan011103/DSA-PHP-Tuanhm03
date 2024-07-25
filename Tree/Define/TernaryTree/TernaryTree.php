<?php
require_once "TernaryNode.php";

use Tree\Define\TernaryTree\TernaryNode;

class TernaryTree
{
    private mixed $root;

    public function __construct()
    {
        $this->root = null;
    }

    // Insertion
    public function insert($value): void
    {
        if ($this->root === null) {
            $this->root = new TernaryNode($value);
        } else {
            $this->insertNode($this->root, $value);
        }
    }

    private function insertNode($node, $value): void
    {
        if ($value < $node->value) {
            if ($node->left === null) {
                $node->left = new TernaryNode($value);
            } else {
                $this->insertNode($node->left, $value);
            }
        } elseif ($value > $node->value) {
            if ($node->right === null) {
                $node->right = new TernaryNode($value);
            } else {
                $this->insertNode($node->right, $value);
            }
        } else {
            if ($node->middle === null) {
                $node->middle = new TernaryNode($value);
            } else {
                $this->insertNode($node->middle, $value);
            }
        }
    }

    // Deletion
    public function delete($value): void
    {
        $this->root = $this->deleteNode($this->root, $value);
    }

    private function deleteNode($node, $value)
    {
        if ($node === null) {
            return null;
        }

        if ($value < $node->value) {
            $node->left = $this->deleteNode($node->left, $value);
        } elseif ($value > $node->value) {
            $node->right = $this->deleteNode($node->right, $value);
        } else {
            // Node to delete found
            if ($node->left === null && $node->middle === null && $node->right === null) {
                return null;
            } elseif ($node->middle !== null) {
                $node->value  = $this->minValue($node->middle);
                $node->middle = $this->deleteNode($node->middle, $node->value);
            } elseif ($node->right !== null) {
                $minRight    = $this->minValue($node->right);
                $node->value = $minRight;
                $node->right = $this->deleteNode($node->right, $minRight);
            } else {
                return $node->left;
            }
        }
        return $node;
    }

    private function minValue($node)
    {
        $current = $node;
        while ($current->left !== null) {
            $current = $current->left;
        }
        return $current->value;
    }

    // Traversals
    public function preOrderTraversal(): void
    {
        $this->preOrder($this->root);
    }

    private function preOrder($node): void
    {
        if ($node !== null) {
            echo $node->value . " ";
            $this->preOrder($node->left);
            $this->preOrder($node->middle);
            $this->preOrder($node->right);
        }
    }

    public function inOrderTraversal(): void
    {
        $this->inOrder($this->root);
    }

    private function inOrder($node): void
    {
        if ($node !== null) {
            $this->inOrder($node->left);
            echo $node->value . " ";
            $this->inOrder($node->middle);
            $this->inOrder($node->right);
        }
    }

    public function postOrderTraversal(): void
    {
        $this->postOrder($this->root);
    }

    private function postOrder($node): void
    {
        if ($node !== null) {
            $this->postOrder($node->left);
            $this->postOrder($node->middle);
            $this->postOrder($node->right);
            echo $node->value . " ";
        }
    }
}

// Example usage
$tree = new TernaryTree();
$tree->insert(5);
$tree->insert(3);
$tree->insert(7);
$tree->insert(5);
$tree->insert(2);
$tree->insert(6);
$tree->insert(8);
$tree->insert(7);

echo "\n";
echo "Pre-order traversal: ";
$tree->preOrderTraversal();
echo "\n";

echo "In-order traversal: ";
$tree->inOrderTraversal();
echo "\n";

echo "Post-order traversal: ";
$tree->postOrderTraversal();
echo "\n";

$tree->delete(5); // This will delete the root node

echo "Pre-order traversal after deletion: ";
$tree->preOrderTraversal();
echo "\n";
//
//          5
//      /   |   \
//     3    5    7
//    /       /  |  \
//   2       6   7   8
//
//          5
//      /       \
//     3         7
//    /       /  |  \
//   2       6   7   8


