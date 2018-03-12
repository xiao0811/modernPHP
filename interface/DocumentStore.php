<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/12
 * Time: 下午10:05
 */

require_once 'Documentable.php';
require_once 'CommandOutputDocument.php';
require_once 'HtmlDocument.php';
require_once 'StreamDocument.php';
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
//var_dump($documentStore->getDocumnets());

//添加HTML文档
$htmlDoc = new HtmlDocument('http:://www.baidu.com');
$documentStore->addDocument($htmlDoc);

//添加流文档
$streamDoc = new StreamDocument(fopen('stream.txt', 'rb'));
$documentStore->addDocument($streamDoc);

//添加终端命令文档
$comDoc = new CommandOutputDocument('cat /etc/hosts');
$documentStore->addDocument($comDoc);

print_r($documentStore);