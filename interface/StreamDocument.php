<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/12
 * Time: 下午10:48
 */

//require_once "Documentable.php";

class StreamDocument implements Documentable
{
    protected $resource;
    protected $buffer;

    public function __construct($resource, $buffer = 4096)
    {
        $this->resource = $resource;
        $this->buffer = $buffer;
    }

    public function getID()
    {
        return 'resource-' . (int)$this->resource;
    }

    public function getContent()
    {
        $streamContent = '';
        rewind($this->resource);
        while (feof($this->resource) === false) {
            $streamContent .= fread($this->resource, $this->buffer);
        }

        return $streamContent;
    }
}

//$streamDoc = new StreamDocument(fopen('stream.txt', 'rb'));
//var_dump($streamDoc->getContent());