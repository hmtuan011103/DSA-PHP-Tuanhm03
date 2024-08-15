<?php

namespace Tree\Define\BTree;

require_once "./BTreeNode.php";

class BTree {
    private mixed $root;
    private mixed $t; // Minimum degree

    public function __construct($t) {
        $this->root = null;
        $this->t = $t;
    }

    public function insert($k): void
    {
        if ($this->root == null) {
            $this->root = new BTreeNode();
            $this->root->keys[0] = $k;
            $this->root->n = 1;
        } else {
            if ($this->root->n == (2 * $this->t - 1)) {
                $s = new BTreeNode(false);
                $s->children[0] = $this->root;
                $this->splitChild($s, 0);
                $i = 0;
                if ($s->keys[0] < $k) {
                    $i++;
                }
                $this->insertNonFull($s->children[$i], $k);
                $this->root = $s;
            } else {
                $this->insertNonFull($this->root, $k);
            }
        }
    }

    private function insertNonFull($x, $k): void
    {
        $i = $x->n - 1;
        if ($x->leaf) {
            while ($i >= 0 && $k < $x->keys[$i]) {
                $x->keys[$i + 1] = $x->keys[$i];
                $i--;
            }
            $x->keys[$i + 1] = $k;
            $x->n = $x->n + 1;
        } else {
            while ($i >= 0 && $k < $x->keys[$i]) {
                $i--;
            }
            $i++;
            if ($x->children[$i]->n == (2 * $this->t - 1)) {
                $this->splitChild($x, $i);
                if ($k > $x->keys[$i]) {
                    $i++;
                }
            }
            $this->insertNonFull($x->children[$i], $k);
        }
    }

    private function splitChild($x, $i): void
    {
        $t = $this->t;
        $y = $x->children[$i];
        $z = new BTreeNode($y->leaf);
        $z->n = $t - 1;

        for ($j = 0; $j < $t - 1; $j++) {
            $z->keys[$j] = $y->keys[$j + $t];
        }

        if (!$y->leaf) {
            for ($j = 0; $j < $t; $j++) {
                $z->children[$j] = $y->children[$j + $t];
            }
        }

        $y->n = $t - 1;

        for ($j = $x->n; $j >= $i + 1; $j--) {
            $x->children[$j + 1] = $x->children[$j];
        }

        $x->children[$i + 1] = $z;

        for ($j = $x->n - 1; $j >= $i; $j--) {
            $x->keys[$j + 1] = $x->keys[$j];
        }

        $x->keys[$i] = $y->keys[$t - 1];
        $x->n = $x->n + 1;
    }

    public function search($k) {
        return $this->searchKey($this->root, $k);
    }

    private function searchKey($x, $k) {
        $i = 0;
        while ($i < $x->n && $k > $x->keys[$i]) {
            $i++;
        }
        if ($i < $x->n && $k == $x->keys[$i]) {
            return $x;
        }
        if ($x->leaf) {
            return null;
        }
        return $this->searchKey($x->children[$i], $k);
    }

    public function traverse(): void
    {
        if ($this->root !== null) {
            $this->traverseNode($this->root);
        }
    }

    private function traverseNode($x): void
    {
        for ($i = 0; $i < $x->n; $i++) {
            if (!$x->leaf) {
                $this->traverseNode($x->children[$i]);
            }
            echo $x->keys[$i] . " ";
        }
        if (!$x->leaf) {
            $this->traverseNode($x->children[$i]);
        }
    }

    // Thêm phương thức delete
    public function delete($k) {
        if (!$this->root) {
            echo "Cây rỗng!\n";
            return;
        }
        $this->deleteKey($this->root, $k);

        if ($this->root->n == 0) {
            if ($this->root->leaf) {
                $this->root = null;
            } else {
                $this->root = $this->root->children[0];
            }
        }
    }

    private function deleteKey($x, $k): void
    {
        $idx = $this->findKey($x, $k);

        if ($idx < $x->n && $x->keys[$idx] == $k) {
            if ($x->leaf) {
                $this->removeFromLeaf($x, $idx);
            } else {
                $this->removeFromNonLeaf($x, $idx);
            }
        } else {
            if ($x->leaf) {
                echo "Khóa $k không tồn tại trong cây\n";
                return;
            }

            $flag = ($idx == $x->n);

            if ($x->children[$idx]->n < $this->t) {
                $this->fill($x, $idx);
            }

            if ($flag && $idx > $x->n) {
                $this->deleteKey($x->children[$idx - 1], $k);
            } else {
                $this->deleteKey($x->children[$idx], $k);
            }
        }
    }

    private function removeFromLeaf($x, $idx): void
    {
        for ($i = $idx + 1; $i < $x->n; ++$i) {
            $x->keys[$i - 1] = $x->keys[$i];
        }
        $x->n--;
    }

    private function removeFromNonLeaf($x, $idx): void
    {
        $k = $x->keys[$idx];

        if ($x->children[$idx]->n >= $this->t) {
            $pred = $this->getPred($x, $idx);
            $x->keys[$idx] = $pred;
            $this->deleteKey($x->children[$idx], $pred);
        } elseif ($x->children[$idx + 1]->n >= $this->t) {
            $succ = $this->getSucc($x, $idx);
            $x->keys[$idx] = $succ;
            $this->deleteKey($x->children[$idx + 1], $succ);
        } else {
            $this->merge($x, $idx);
            $this->deleteKey($x->children[$idx], $k);
        }
    }

    private function getPred($x, $idx) {
        $cur = $x->children[$idx];
        while (!$cur->leaf) {
            $cur = $cur->children[$cur->n];
        }
        return $cur->keys[$cur->n - 1];
    }

    private function getSucc($x, $idx) {
        $cur = $x->children[$idx + 1];
        while (!$cur->leaf) {
            $cur = $cur->children[0];
        }
        return $cur->keys[0];
    }

    private function fill($x, $idx): void
    {
        if ($idx != 0 && $x->children[$idx - 1]->n >= $this->t) {
            $this->borrowFromPrev($x, $idx);
        } elseif ($idx != $x->n && $x->children[$idx + 1]->n >= $this->t) {
            $this->borrowFromNext($x, $idx);
        } else {
            if ($idx != $x->n) {
                $this->merge($x, $idx);
            } else {
                $this->merge($x, $idx - 1);
            }
        }
    }

    private function borrowFromPrev($x, $idx): void
    {
        $child = $x->children[$idx];
        $sibling = $x->children[$idx - 1];

        for ($i = $child->n - 1; $i >= 0; --$i) {
            $child->keys[$i + 1] = $child->keys[$i];
        }

        if (!$child->leaf) {
            for ($i = $child->n; $i >= 0; --$i) {
                $child->children[$i + 1] = $child->children[$i];
            }
        }

        $child->keys[0] = $x->keys[$idx - 1];

        if (!$child->leaf) {
            $child->children[0] = $sibling->children[$sibling->n];
        }

        $x->keys[$idx - 1] = $sibling->keys[$sibling->n - 1];

        $child->n += 1;
        $sibling->n -= 1;
    }

    private function borrowFromNext($x, $idx): void
    {
        $child = $x->children[$idx];
        $sibling = $x->children[$idx + 1];

        $child->keys[$child->n] = $x->keys[$idx];

        if (!$child->leaf) {
            $child->children[$child->n + 1] = $sibling->children[0];
        }

        $x->keys[$idx] = $sibling->keys[0];

        for ($i = 1; $i < $sibling->n; ++$i) {
            $sibling->keys[$i - 1] = $sibling->keys[$i];
        }

        if (!$sibling->leaf) {
            for ($i = 1; $i <= $sibling->n; ++$i) {
                $sibling->children[$i - 1] = $sibling->children[$i];
            }
        }

        $child->n += 1;
        $sibling->n -= 1;
    }

    private function merge($x, $idx): void
    {
        $child = $x->children[$idx];
        $sibling = $x->children[$idx + 1];

        $child->keys[$this->t - 1] = $x->keys[$idx];

        for ($i = 0; $i < $sibling->n; ++$i) {
            $child->keys[$i + $this->t] = $sibling->keys[$i];
        }

        if (!$child->leaf) {
            for ($i = 0; $i <= $sibling->n; ++$i) {
                $child->children[$i + $this->t] = $sibling->children[$i];
            }
        }

        for ($i = $idx + 1; $i < $x->n; ++$i) {
            $x->keys[$i - 1] = $x->keys[$i];
        }

        for ($i = $idx + 2; $i <= $x->n; ++$i) {
            $x->children[$i - 1] = $x->children[$i];
        }

        $child->n += $sibling->n + 1;
        $x->n--;
    }

    private function findKey($x, $k): int
    {
        $idx = 0;
        while ($idx < $x->n && $x->keys[$idx] < $k) {
            ++$idx;
        }
        return $idx;
    }
}

$t = 3; // Minimum degree
$btree = new BTree($t);

$keys = [10, 20, 5, 6, 12, 30, 7, 17];

foreach ($keys as $key) {
    $btree->insert($key);
}

echo "\nCây B sau khi chèn: ";
$btree->traverse();

$deleteKey = 6;
$btree->delete($deleteKey);
echo "\nCây B sau khi xóa $deleteKey: ";
$btree->traverse();

$searchKey = 6;
$result = $btree->search($searchKey);
echo "\nTìm kiếm khóa $searchKey: " . ($result ? "Tìm thấy\n" : "Không tìm thấy\n");