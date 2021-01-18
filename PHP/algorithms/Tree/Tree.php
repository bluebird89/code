<?php


namespace Algorithms\Tree;

use SplQueue;
use SplStack;

include '../../vendor/autoload.php';

class Tree
{

    public $root = null;

    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    public function traverse(TreeNode $node, int $level = 0)
    {

        if ($node) {
            echo str_repeat("-", $level);
            echo $node->data."\n";

            foreach ($node->children as $childNode) {
                $this->traverse($childNode, $level + 1);
            }
        }
    }

    public function BFS(TreeNode $node): SplQueue
    {
        $queue = new SplQueue;
        $visited = new SplQueue;
        $queue->enqueue($node);

        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            $visited->enqueue($current);
            foreach ($current->children as $child) {
                $queue->enqueue($child);
            }
        }

        return $visited;
    }

    public function DFS(TreeNode $node): SplQueue
    {
        $stack = new SplStack;
        $visited = new SplQueue;
        $stack->push($node);

        while (!$stack->isEmpty()) {
            $current = $stack->pop();
            $visited->enqueue($current);
            $current->children = array_reverse($current->children);
            foreach ($current->children as $child) {
                $stack->push($child);
            }
        }

        return $visited;
    }
}

try {
    $ceo = new TreeNode("CEO");

    $tree = new Tree($ceo);

    $cto = new TreeNode("CTO");
    $cfo = new TreeNode("CFO");
    $cmo = new TreeNode("CMO");
    $coo = new TreeNode("COO");

    $ceo->addChildren($cto);
    $ceo->addChildren($cfo);
    $ceo->addChildren($cmo);
    $ceo->addChildren($coo);

    $seniorArchitect = new TreeNode("Senior Architect");
    $softwareEngineer = new TreeNode("Software Engineer");
    $userInterfaceDesigner = new TreeNode("User Interface Designer");
    $qualityAssuranceEngineer = new TreeNode("Quality Assurance Engineer");

    $cto->addChildren($seniorArchitect);
    $seniorArchitect->addChildren($softwareEngineer);
    $cto->addChildren($qualityAssuranceEngineer);
    $cto->addChildren($userInterfaceDesigner);

    $tree->traverse($tree->root);

} catch (Exception $e) {
    echo $e->getMessage();
}

$root = new TreeNode("8");
$tree = new Tree($root);
$node1 = new TreeNode("3");
$node2 = new TreeNode("10");
$root->addChildren($node1);
$root->addChildren($node2);
$node3 = new TreeNode("1");
$node4 = new TreeNode("6");
$node5 = new TreeNode("14");
$node1->addChildren($node3);
$node1->addChildren($node4);
$node2->addChildren($node5);
$node6 = new TreeNode("4");
$node7 = new TreeNode("7");
$node8 = new TreeNode("13");
$node4->addChildren($node6);
$node4->addChildren($node7);
$node5->addChildren($node8);
echo '---------------- BFS-----------'.PHP_EOL;
$visited = $tree->BFS($tree->root);
while (!$visited->isEmpty()) {
    echo $visited->dequeue()->data."\n";
}

echo '---------------- DFS-----------'.PHP_EOL;
try {
    $visited = $tree->DFS($tree->root);
    while (!$visited->isEmpty()) {
        echo $visited->dequeue()->data."\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
