<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/12
 * Time: 下午10:05
 */

class DocumentStore
{
    protected $data = [];

    public function addDocument(Documentable $documentable)
    {
        $key = $documentable->getId();
        $value = $documentable->getContent();
        $this->data[$key] = $value;
    }

    public function getDocumnets()
    {
        return $this->data;
    }
}

$documentStore = new DocumentStore();
var_dump($documentStore->getDocumnets());