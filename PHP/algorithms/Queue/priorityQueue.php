<?php


require '../../vendor/autoload.php';

class ListNode
{

    public $data = null;
    public $next = null;
    public $priority = null;

    public function __construct(string $data = null, int $priority = null)
    {
        $this->data = $data;
        $this->priority = $priority;
    }

}

class LinkedList implements Iterator
{

    private $_firstNode = null;
    private $_totalNode = 0;
    private $_currentNode = null;
    private $_currentPosition = 0;

    public function insert(string $data = null, int $priority = null)
    {
        $newNode = new ListNode($data, $priority);
        $this->_totalNode++;

        if ($this->_firstNode === null) {
            $this->_firstNode = &$newNode;
        } else {
            $previous = $this->_firstNode;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->priority < $priority) {

                    if ($currentNode == $this->_firstNode) {
                        $previous = $this->_firstNode;
                        $this->_firstNode = $newNode;
                        $newNode->next = $previous;
                        return;
                    }
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    return;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }

        return true;
    }

    public function deleteFirst()
    {
        if ($this->_firstNode !== null) {
            if ($this->_firstNode->next !== null) {
                $this->_firstNode = $this->_firstNode->next;
            } else {
                $this->_firstNode = null;
            }
            $this->_totalNode--;
            return true;
        }
        return false;
    }


    public function getSize()
    {
        return $this->_totalNode;
    }

    public function current()
    {
        return $this->_currentNode->data;
    }

    public function next()
    {
        $this->_currentPosition++;
        $this->_currentNode = $this->_currentNode->next;
    }

    public function key()
    {
        return $this->_currentPosition;
    }

    public function rewind()
    {
        $this->_currentPosition = 0;
        $this->_currentNode = $this->_firstNode;
    }

    public function valid()
    {
        return $this->_currentNode !== null;
    }

    public function getNthNode(int $n = 0)
    {
        $count = 1;
        if ($this->_firstNode !== null && $n <= $this->_totalNode) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($count === $n) {
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function display()
    {
        echo "Total book titles: ".$this->_totalNode."\n";
        $currentNode = $this->_firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data."\n";
            $currentNode = $currentNode->next;
        }
    }
}


interface Queue
{

    public function enqueue(string $item, int $p);

    public function dequeue();

    public function peek();

    public function isEmpty();
}

class AgentQueue implements Queue
{

    private $limit;
    private $queue;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    public function dequeue(): string
    {

        if ($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        } else {
            $lastItem = $this->peek();
            $this->queue->deleteFirst();
            return $lastItem;
        }
    }


    public function enqueue(string $newItem, int $priority)
    {

        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($newItem, $priority);
        } else {
            throw new OverflowException('Queue is full');
        }
    }

    public function peek(): string
    {
        return $this->queue->getNthNode(1)->data;
    }

    public function isEmpty(): bool
    {
        return $this->queue->getSize() == 0;
    }

    public function display()
    {
        $this->queue->display();
    }

}

try {
    $agents = new AgentQueue(10);
    $agents->enqueue("Fred", 1);
    $agents->enqueue("John", 2);
    $agents->enqueue("Keith", 3);
    $agents->enqueue("Adiyan", 4);
    $agents->enqueue("Mikhael", 2);
    $agents->display();
    echo $agents->dequeue()."\n";
    echo $agents->dequeue()."\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
