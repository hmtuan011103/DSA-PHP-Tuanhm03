<?php
namespace Tree\Define\BinaryTree;

require_once "TreeNode.php";

class BinarySearchTreeNotRecursive
{
    public mixed $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert($value): void
    {
        $newNode = new TreeNode($value);
        if ($this->root === null) {
            $this->root = $newNode;
            return;
        }

        $current = $this->root;
        while (true) {
            if ($value < $current->value) {
                if ($current->left === null) {
                    $current->left = $newNode;
                    break;
                }
                $current = $current->left;
            } else {
                if ($current->right === null) {
                    $current->right = $newNode;
                    break;
                }
                $current = $current->right;
            }
        }
    }

    public function search($value): bool
    {
        $current = $this->root;
        while ($current !== null) {
            if ($value === $current->value) {
                return true;
            }
            if ($value < $current->value) {
                $current = $current->left;
            } else {
                $current = $current->right;
            }
        }
        return false;
    }

    public function delete($value)
    {
        $parent = null;
        $current = $this->root;

        // Find the node to be deleted
        while ($current !== null && $current->value !== $value) {
            $parent = $current;
            if ($value < $current->value) {
                $current = $current->left;
            } else {
                $current = $current->right;
            }
        }

        if ($current === null) {
            return $this->root; // Value not found
        }

        // Case 1: Node to be deleted has no children
        if ($current->left === null && $current->right === null) {
            if ($current !== $this->root) {
                if ($parent->left === $current) {
                    $parent->left = null;
                } else {
                    $parent->right = null;
                }
            } else {
                $this->root = null;
            }
        }
        // Case 2: Node to be deleted has only one child
        elseif ($current->right === null) {
            if ($current !== $this->root) {
                if ($parent->left === $current) {
                    $parent->left = $current->left;
                } else {
                    $parent->right = $current->left;
                }
            } else {
                $this->root = $current->left;
            }
        }
        elseif ($current->left === null) {
            if ($current !== $this->root) {
                if ($parent->left === $current) {
                    $parent->left = $current->right;
                } else {
                    $parent->right = $current->right;
                }
            } else {
                $this->root = $current->right;
            }
        }
        // Case 3: Node to be deleted has two children
        else {
            $successor = $this->getSuccessor($current);
            $successorValue = $successor->value;
            $this->delete($successorValue);
            $current->value = $successorValue;
        }

        return $this->root;
    }

    private function getSuccessor($node)
    {
        $current = $node->right;
        while ($current->left !== null) {
            $current = $current->left;
        }
        return $current;
    }

    public function dfsTraversal($type = 'inorder'): array
    {
        $result = [];
        $stack = [];
        $current = $this->root;

        switch ($type) {
            case 'preorder':
                while ($current !== null || !empty($stack)) {
                    while ($current !== null) {
                        $result[] = $current->value;
                        $stack[] = $current;
                        $current = $current->left;
                    }
                    $current = array_pop($stack);
                    $current = $current->right;
                }
                break;
            case 'inorder':
                while ($current !== null || !empty($stack)) {
                    while ($current !== null) {
                        $stack[] = $current;
                        $current = $current->left;
                    }
                    $current = array_pop($stack);
                    $result[] = $current->value;
                    $current = $current->right;
                }
                break;
            case 'postorder':
                $lastVisited = null;
                while ($current !== null || !empty($stack)) {
                    while ($current !== null) {
                        $stack[] = $current;
                        $current = $current->left;
                    }
                    $peek = $stack[count($stack) - 1];
                    if ($peek->right !== null && $lastVisited !== $peek->right) {
                        $current = $peek->right;
                    } else {
                        $result[] = $peek->value;
                        $lastVisited = array_pop($stack);
                    }
                }
                break;
        }

        return $result;
    }

    public function bfsTraversalRecursive(): array
    {
        $result = [];
        if ($this->root !== null) {
            $this->bfsHelper([$this->root], $result);
        }
        return $result;
    }

    private function bfsHelper(array $nodes, array &$result): void
    {
        if (empty($nodes)) {
            return;
        }

        $nextLevel = [];
        foreach ($nodes as $node) {
            $result[] = $node->value;

            if ($node->left !== null) {
                $nextLevel[] = $node->left;
            }
            if ($node->right !== null) {
                $nextLevel[] = $node->right;
            }
        }

        $this->bfsHelper($nextLevel, $result);
    }
}
$tree = new BinarySearchTreeNotRecursive();
$tree->insert(10);
$tree->insert(5);
$tree->insert(15);
$tree->insert(3);
$tree->insert(7);
$tree->insert(8);
$tree->insert(15);

echo "Search 7: " . ($tree->search(7) ? "Found" : "Not Found") . "\n";
echo "Search 9: " . ($tree->search(9) ? "Found" : "Not Found") . "\n";

echo "DFS Traversal: (Left - Root - Right) \n";
print_r($tree->dfsTraversal());

echo "DFS Traversal: (Root - Left - Right) \n";
print_r($tree->dfsTraversal('preorder'));

echo "DFS Traversal: (Left - Right - Root) \n";
print_r($tree->dfsTraversal('postorder'));

echo "BFS Traversal:  \n";
print_r($tree->bfsTraversalRecursive());

echo "Delete Node: \n";
print_r($tree->delete(5));

echo "DFS Traversal After Delete Node: (Left - Root - Right) \n";
print_r($tree->dfsTraversal());

//           10
//        /      \
//       5        15
//     /   \    /    \
//    3     7         15
//           \
//            8