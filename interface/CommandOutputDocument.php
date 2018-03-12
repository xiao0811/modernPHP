<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/12
 * Time: 下午10:54
 */

require_once 'Documentable.php';

class CommandOutputDocument implements Documentable
{
    protected $command;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function getID()
    {
        return $this->command;
    }

    public function getContent()
    {
        return shell_exec($this->command);
    }
}

$comDoc = new CommandOutputDocument('cat /etc/hosts');
var_dump($comDoc->getContent());