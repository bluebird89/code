<?php


namespace Algorithms\Graph;


use SplQueue;
use SplStack;

class Graph
{

    public $graph = [];
    public $visited = [];
    public $vertexCount;

    function __construct($vertexCount)
    {
        $this->$vertexCount = $vertexCount;
        for ($i = 1; $i <= $vertexCount; $i++) {
            $this->graph[$i] = array_fill(1, $this->vertexCount, 0);
            $this->visited[$i] = 0;
        }
    }

    static function BFS(array &$graph, int $start, array $visited): SplQueue
    {
        $queue = new SplQueue;
        $path = new SplQueue;
        $queue->enqueue($start);
        $visited[$start] = 1;

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $path->enqueue($node);
            foreach ($graph[$node] as $key => $vertex) {
                if (!$visited[$key] && $vertex == 1) {
                    $visited[$key] = 1;
                    $queue->enqueue($key);
                }
            }
        }

        return $path;
    }

    static function DFS(array &$graph, int $start, array $visited): SplQueue
    {
        $stack = new SplStack;
        $path = new SplQueue;
        $stack->push($start);
        $visited[$start] = 1;
        while (!$stack->isEmpty()) {
            $node = $stack->pop();
            $path->enqueue($node);
            foreach ($graph[$node] as $key => $vertex) {
                if (!$visited[$key] && $vertex == 1) {
                    $visited[$key] = 1;
                    $stack->push($key);
                }
            }
        }
        return $path;
    }
}

$instance = new Graph(6);
$instance->graph[1][2] = $instance->graph[2][1] = 1;
$instance->graph[1][5] = $instance->graph[5][1] = 1;
$instance->graph[5][2] = $instance->graph[2][5] = 1;
$instance->graph[5][4] = $instance->graph[4][5] = 1;
$instance->graph[4][3] = $instance->graph[3][4] = 1;
$instance->graph[3][2] = $instance->graph[2][3] = 1;
$instance->graph[6][4] = $instance->graph[4][6] = 1;

$path = $instance::BFS($instance->graph, 1, $instance->visited);
while (!$path->isEmpty()) {
    echo $path->dequeue()."\t";
}
echo PHP_EOL;
$path = $instance::DFS($instance->graph, 1, $instance->visited);
while (!$path->isEmpty()) {
    echo $path->dequeue()."\t";
}
