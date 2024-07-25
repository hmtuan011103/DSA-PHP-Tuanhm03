<?php

namespace Tree\Define\NaryTree;
require_once "NaryNode.php";

use SplQueue;


class NaryTree {
    private mixed $root;

    public function __construct() {
        $this->root = null;
    }

    public function insert($value, $parentValue = null): void
    {
        $newNode = new NaryNode($value);
        if ($this->root === null) {
            $this->root = $newNode;
            return;
        }

        if ($parentValue === null) {
            $this->root->children[] = $newNode;
        } else {
            $parent = $this->find($parentValue);
            if ($parent) {
                $parent->children[] = $newNode;
            } else {
                echo "Không tìm thấy nút cha có giá trị $parentValue\n";
            }
        }
    }

    public function find($value) {
        return $this->findRecursive($this->root, $value);
    }

    private function findRecursive($node, $value) {
        if ($node->value == $value) {
            return $node;
        }
        foreach ($node->children as $child) {
            $result = $this->findRecursive($child, $value);
            if ($result) {
                return $result;
            }
        }
        return null;
    }

    public function printTree(): void
    {
        $this->printRecursive($this->root, 0);
    }

    private function printRecursive($node, $level): void
    {
        if ($node) {
            echo str_repeat("  ", $level) . $node->value . "\n";
            foreach ($node->children as $child) {
                $this->printRecursive($child, $level + 1);
            }
        }
    }

    public function getDepth() {
        return $this->getDepthRecursive($this->root);
    }

    private function getDepthRecursive($node) {
        if ($node === null) {
            return 0;
        }
        $maxChildDepth = 0;
        foreach ($node->children as $child) {
            $childDepth = $this->getDepthRecursive($child);
            $maxChildDepth = max($maxChildDepth, $childDepth);
        }
        return 1 + $maxChildDepth;
    }

    public function mirror(): void
    {
        $this->mirrorRecursive($this->root);
    }

    private function mirrorRecursive($node): void
    {
        if ($node === null) {
            return;
        }
        $node->children = array_reverse($node->children);
        foreach ($node->children as $child) {
            $this->mirrorRecursive($child);
        }
    }

    public function levelOrderTraversal(): void
    {
        if ($this->root === null) {
            return;
        }
        $queue = new SplQueue();
        $queue->enqueue($this->root);
        while (!$queue->isEmpty()) {
            $levelSize = $queue->count();
            for ($i = 0; $i < $levelSize; $i++) {
                $node = $queue->dequeue();
                echo $node->value . " ";
                foreach ($node->children as $child) {
                    $queue->enqueue($child);
                }
            }
            echo "\n";
        }
    }

    public function getDiameter(): int
    {
        $diameter = 0;
        $this->getDiameterRecursive($this->root, $diameter);
        return $diameter;
    }

    private function getDiameterRecursive($node, &$diameter) {
        if ($node === null) {
            return 0;
        }
        $heights = [];
        foreach ($node->children as $child) {
            $heights[] = $this->getDiameterRecursive($child, $diameter);
        }
        sort($heights);
        $maxHeight = end($heights);
        $secondMaxHeight = prev($heights) ?: 0;
        $diameter = max($diameter, $maxHeight + $secondMaxHeight);
        return $maxHeight + 1;
    }

    public function getSum() {
        return $this->getSumRecursive($this->root);
    }

    private function getSumRecursive($node) {
        if ($node === null) {
            return 0;
        }
        $sum = $node->value;
        foreach ($node->children as $child) {
            $sum += $this->getSumRecursive($child);
        }
        return $sum;
    }

    public function serialize(): bool|string
    {
        return json_encode($this->serializeRecursive($this->root));
    }

    private function serializeRecursive($node): ?array
    {
        if ($node === null) {
            return null;
        }
        $serialized = ['value' => $node->value, 'children' => []];
        foreach ($node->children as $child) {
            $serialized['children'][] = $this->serializeRecursive($child);
        }
        return $serialized;
    }

    public function deserialize($serialized): void
    {
        $data = json_decode($serialized, true);
        $this->root = $this->deserializeRecursive($data);
    }

    private function deserializeRecursive($data): ?NaryNode
    {
        if ($data === null) {
            return null;
        }
        $node = new NaryNode($data['value']);
        foreach ($data['children'] as $childData) {
            $node->children[] = $this->deserializeRecursive($childData);
        }
        return $node;
    }
}

// Sử dụng cây N-ary
$tree = new NaryTree();
$tree->insert(1);  // Root
$tree->insert(2, 1);
$tree->insert(3, 1);
$tree->insert(4, 2);
$tree->insert(5, 2);
$tree->insert(6, 3);

echo "Cấu trúc cây:\n";
$tree->printTree();

echo "\nĐộ sâu của cây: " . $tree->getDepth() . "\n";

echo "\nDuyệt cây theo thứ tự cấp:\n";
$tree->levelOrderTraversal();

echo "\nĐường kính của cây: " . $tree->getDiameter() . "\n";

echo "Tổng giá trị các nút: " . $tree->getSum() . "\n";

echo "\nChuỗi hóa cây:\n";
$serialized = $tree->serialize();
echo $serialized . "\n";

echo "\nGiải mã và in lại cây:\n";
$newTree = new NaryTree();
$newTree->deserialize($serialized);
$newTree->printTree();

echo "\nCây sau khi đảo ngược:\n";
$tree->mirror();
$tree->printTree();