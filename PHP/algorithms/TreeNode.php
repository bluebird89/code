<?php

class TreeNode
{
    public $val;
    public $left;
    public $right;

    public function __construct($x)
    {
        $this->val = $x;
        $this->right = new static();
        $this->left = new static();
    }

    public function addChildren(TreeNode $treeNode)
    {
        $this->children[] = $treeNode;
    }
}

