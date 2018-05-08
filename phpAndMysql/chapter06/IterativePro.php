<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 11:01
 */

class ObjectIterator implements Iterator
{
    private $obj;
    private $count;
    private $currentIndex;

    public function __construct($obj)
    {
        $this->obj = $obj;
        $this->count = count($this->obj->data);
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
        $this->currentIndex = 0;
    }

    public function valid()
    {
        // TODO: Implement valid() method.
        return $this->currentIndex < $this->count;
    }

    public function key()
    {
        // TODO: Implement key() method.
        return $this->currentIndex;
    }

    public function current()
    {
        // TODO: Implement current() method.
        return $this->obj->data[$this->currentIndex];
    }

    public function next()
    {
        // TODO: Implement next() method.
        $this->currentIndex++;
    }
}

class Xiaosha implements IteratorAggregate
{
    public $data = [];

    public function __construct($in)
    {
        $this->data = $in;
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ObjectIterator($this);
    }
}
$data = [2, 4, 6, 8, 10];

$myObject = new Xiaosha($data);
$myIterator = $myObject->getIterator();

/**
 * 0 => 2
 * 1 => 4
 * 2 => 6
 * 3 => 8
 * 4 => 10
 */

for ($myIterator->rewind(); $myIterator->valid(); $myIterator->next()) {
    $key = $myIterator->key();
    $value = $myIterator->current();
    echo $key . " => " . $value . "<br>";
}