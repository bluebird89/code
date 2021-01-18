<?php

namespace Algorithms\Tree;


class BT
{

    /**
     * 前序遍历
     *
     * @param  Node  $tree
     */
    public static function preOrderTraverse($tree): void
    {
        if ($tree == null) {
            return;
        }
        printf("%s\n", $tree->data);
        static::preOrderTraverse($tree->left);
        static::preOrderTraverse($tree->right);
    }

    /**
     * 中序遍历
     *
     * @param  Node  $tree
     */
    public static function midOrderTraverse($tree): void
    {
        if ($tree == null) {
            return;
        }
        static::midOrderTraverse($tree->left);
        printf("%s\n", $tree->data);
        static::midOrderTraverse($tree->right);
    }

    /**
     * 后序遍历
     *
     * @param  Node  $tree
     */
    public static function postOrderTraverse($tree): void
    {
        if ($tree == null) {
            return;
        }
        static::postOrderTraverse($tree->left);
        static::postOrderTraverse($tree->right);
        printf("%s\n", $tree->data);
    }
}

$node1 = new Node('A');
$node2 = new Node('B');
$node3 = new Node('C');
$node1->left = $node2;
$node1->right = $node3;
BT::preOrderTraverse($node1);
printf("========\n");
BT::midOrderTraverse($node1);
printf("========\n");
BT::postOrderTraverse($node1);
