<?php


namespace Algorithms\LinearList;

class ListNode
{
    public $key = null;
    public $value = null;
    public ListNode $next;

    public function __construct($key = null)
    {
        $this->key = $key;
    }
}

class LRU
{

    public $maxSize;
    public $size = 0;
    public $_firstNode;

    public function __construct($maxSize)
    {
        $this->maxSize = $maxSize;
    }

    public function set($key, $value)
    {
        $newNode = new ListNode($key);
        $newNode->value = $value;

        if ($this->_firstNode === null) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;
            while (isset($currentNode->next)) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->size++;

        return true;
    }

    function get($key)
    {
        $node = $this->_firstNode;
        while ($node = $node->next) {
            if ($node->key == $key) {
                return $node->value;
            }
        }

        return null;
    }
}

$ins = new LRU(5);
$ins->set('name', 'Henry');
$ins->set('age', 30);
$ins->set('age', 40);
$ins->set('age', 50);
$ins->set('age', 60);
$ins->set('name', 'lily');
$ins->set('name', 'henry2');
$ins->set('name', 'henry3');

var_dump($ins->get('name'));
