<?php

namespace Algorithms\Tree;

class Node
{
	public $data;
	public $left = null;
	public $right = null;

	public function __construct($data)
	{
		$this->data = $data;
	}
}