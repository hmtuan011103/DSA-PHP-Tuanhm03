<?php
require_once "TreeNode.php";

use Tree\Define\Binary\TreeNode;

class BinarySearchTree
{
    public mixed $root;

    public function __construct()
    {
        $this->root = null;
    }

    // Insert data in the tree
    public function insert($value): void
    {
        $newNode = new TreeNode($value);
        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
    }

    private function insertNode($node, $newNode): void
    {
        if ($newNode->value < $node->value) {
            if ($node->left === null) {
                $node->left = $newNode;
            } else {
                $this->insertNode($node->left, $newNode);
            }
        } else {
            if ($node->right === null) {
                $node->right = $newNode;
            } else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }

    // Search specific data in the tree
    public function search($value): bool
    {
        return $this->searchNode($this->root, $value);
    }

    private function searchNode($node, $value): bool
    {
        if ($node === null) {
            return false;
        }
        if ($value < $node->value) {
            return $this->searchNode($node->left, $value);
        } elseif ($value > $node->value) {
            return $this->searchNode($node->right, $value);
        } else {
            return true;
        }
    }

    // Depth-First-Search Traversal (In-order)
    public function dfsTraversal($type = 'inorder')
    {
        return match ($type) {
            'preorder' => $this->preOrder($this->root, []),
            'postorder' => $this->postOrder($this->root, []),
            default => $this->inOrder($this->root, []),
        };
    }

    // Inorder (Left - Root - Right)
    private function inOrder($node, $result) {
        if ($node !== null) {
            $result = $this->inOrder($node->left, $result);
            $result[] = $node->value;
            $result = $this->inOrder($node->right, $result);
        }
        return $result;
    }

    // Preorder (Root - Left - Right)
    private function preOrder($node, $result) {
        if ($node !== null) {
            $result[] = $node->value;
            $result = $this->preOrder($node->left, $result);
            $result = $this->preOrder($node->right, $result);
        }
        return $result;
    }

    // Postorder (Left - Right - Root)
    private function postOrder($node, $result) {
        if ($node !== null) {
            $result = $this->postOrder($node->left, $result);
            $result = $this->postOrder($node->right, $result);
            $result[] = $node->value;
        }
        return $result;
    }

    // Breadth-First-Search Traversal
    public function bfsTraversal(): array
    {
        $result = [];
        $queue  = [];
        if ($this->root !== null) {
            $queue[] = $this->root;
            while (!empty($queue)) {
                $node     = array_shift($queue);
                $result[] = $node->value;
                if ($node->left !== null) {
                    $queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
            }
        }
        return $result;
    }
}

$tree = new BinarySearchTree();
$tree->insert(10);
$tree->insert(5);
$tree->insert(15);
$tree->insert(3);
$tree->insert(7);
$tree->insert(8);
$tree->insert(15);

print_r($tree);
echo "Search 7: " . ($tree->search(7) ? "Found" : "Not Found") . "\n";
echo "Search 9: " . ($tree->search(9) ? "Found" : "Not Found") . "\n";

echo "DFS Traversal: (Left - Root - Right) \n";
print_r($tree->dfsTraversal());

echo "DFS Traversal: (Root - Left - Right) \n";
print_r($tree->dfsTraversal('preorder'));

echo "DFS Traversal: (Left - Right - Root) \n";
print_r($tree->dfsTraversal('postorder'));

echo "BFS Traversal:  \n";
print_r($tree->bfsTraversal());

//           10
//        /      \
//       5        15
//     /   \    /    \
//    3     7         15
//           \
//            8
