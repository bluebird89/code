<?php

/*
 * Example code for: PHP 7 Data Structures and Algorithms
 *
 * Author: Mizanur rahman <mizanur.rahman@gmail.com>
 *
 */


class ListNode
{

    public $data = null;
    public $next = null;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }

}

class LinkedList implements Iterator
{

    private $_firstNode = null;
    private $_totalNode = 0;
    private $_currentNode = null;
    private $_currentPosition = 0;

    public function insert(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->_totalNode++;
        return true;
    }

    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = &$newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = &$newNode;
            $newNode->next = $currentFirstNode;
        }
        $this->_totalNode++;
        return true;
    }

    public function search(string $data = null)
    {
        if ($this->_totalNode) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        return false;
    }

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    $this->_totalNode++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode) {
            $nextNode = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->_totalNode++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
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

    public function deleteLast()
    {
        if ($this->_firstNode !== null) {
            $currentNode = $this->_firstNode;
            if ($currentNode->next === null) {
                $this->_firstNode = null;
            } else {
                $previousNode = null;

                while ($currentNode->next !== null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = null;
                $this->_totalNode--;
                return true;
            }
        }
        return false;
    }

    public function delete(string $query = null)
    {
        if ($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($currentNode->next === null) {
                        $previous->next = null;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    $this->_totalNode--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function reverse()
    {
        if ($this->_firstNode !== null) {
            if ($this->_firstNode->next !== null) {
                $reversedList = null;
                $next = null;
                $currentNode = $this->_firstNode;
                while ($currentNode !== null) {
                    $next = $currentNode->next;
                    $currentNode->next = $reversedList;
                    $reversedList = $currentNode;
                    $currentNode = $next;
                }
                $this->_firstNode = $reversedList;
            }
        }
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

}


interface Queue
{

    public function enqueue(string $item);

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

    public function enqueue(string $newItem)
    {

        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($newItem);
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

}

try {
    $agents = new AgentQueue(10);
    $agents->enqueue("Fred");
    $agents->enqueue("John");
    $agents->enqueue("Keith");
    $agents->enqueue("Adiyan");
    $agents->enqueue("Mikhael");
    echo $agents->dequeue()."\n";
    echo $agents->dequeue()."\n";
    echo $agents->peek()."\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
