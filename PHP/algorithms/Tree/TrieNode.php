<?php

namespace Algorithms\DataStructure;

class  TrieNode
{
    public $data;  // 节点字符
    public array $children = [];  // 存放子节点引用（因为有任意个子节点，所以靠数组来存储）
    public bool $isEndingChar = false;  // 是否是字符串结束字符

    public function __construct($data)
    {
        $this->data = $data;
    }
}
