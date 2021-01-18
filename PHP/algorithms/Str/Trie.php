<?php


namespace Algorithms\Str;

use Algorithms\Search\DataStructure\TrieNode;

class Trie
{
    private $root;

    public function __construct()
    {
        $this->root = new TrieNode('/'); // 存储无意义字符
    }

    // 往 Trie 树中插入一个字符串
    public function insert(array $text)
    {
        $p = $this->root;
        for ($i = 0, $iMax = count($text); $i < $iMax; $i++) {
            $index = ord($text[$i]) - ord('a');
            if ($p->children[$index] == null) {
                $newNode = new TrieNode($text[$i]);
                $p->children[$index] = $newNode;
            }
            $p = $p->children[$index];
        }
        $p->isEndingChar = true;
    }

    // 在 Trie 树中查找一个字符串
    public function find(array $pattern)
    {
        $p = $this->root;
        for ($i = 0, $iMax = count($pattern); $i < $iMax; $i++) {
            $index = ord($pattern[$i]) - ord('a');
            if ($p->children[$index] == null) {
                // 不存在 pattern
                return false;
            }
            $p = $p->children[$index];
        }
        if ($p->isEndingChar == false) {
            return false; // 不能完全匹配，只是前缀
        }
        return true; // 找到 pattern
    }

    // 往 Trie 树中插入一个字符串
    public function insertStr($text)
    {
        $p = $this->root;
        for ($i = 0, $iMax = mb_strlen($text); $i < $iMax; $i++) {
            $index = $data = $text[$i];
            if (!isset($p->children[$index]) || $p->children[$index] == null) {
                $newNode = new TrieNode($data);
                $p->children[$index] = $newNode;
            }
            $p = $p->children[$index];
        }
        $p->isEndingChar = true;
    }

    // 在 Trie 树中查找一个字符串
    public function findStr($pattern)
    {
        $p = $this->root;
        for ($i = 0, $iMax = mb_strlen($pattern); $i < $iMax; $i++) {
            $index = $pattern[$i];
            if (!isset($p->children[$index]) || $p->children[$index] == null) {
                // 不存在 pattern
                return false;
            }
            $p = $p->children[$index];
        }
        if ($p->isEndingChar == false) {
            return false; // 不能完全匹配，只是前缀
        }
        return true; // 找到 pattern
    }
}
