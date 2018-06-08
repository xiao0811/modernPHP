<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-8
 * Time: 13:07
 */

class Ws
{
    CONST HOST = "0.0.0.0";
    CONST PORT = 8812;

    public $ws = null;
    public function __construct()
    {
        $this->ws = new swoole_websocket_server(Ws::HOST, Ws::PORT);
        $this->ws->set([
            'worker_num' => 10,
            'task_worker_num' => 10,
        ]);
        $this->ws->on("open", [$this, 'onOpen']);
        $this->ws->on("message", [$this, 'onMessage']);
        $this->ws->on("close", [$this, 'onClose']);
        $this->ws->on("task", [$this, 'onTask']);
        $this->ws->on("finish", [$this, 'onFinish']);

        $this->ws->start();
    }

    /**
     * 监听ws连接事件
     * @param $ws
     * @param $request
     */
    public function onOpen($ws, $request)
    {
        var_dump($request->fd);
    }

    /**
     * 监听ws消息时间
     * @param $ws
     * @param $frame
     */
    public function onMessage($ws, $frame)
    {
        echo "ser-push-message: {$frame->data}\n";
        // todo 10s
        $data = [
            'task' => 1,
            'fd' => $frame->fd
        ];
        $ws->task($data);
        $ws->push($frame->fd, "server-push: " .date("Y-m-d H:i:s"));
    }

    public function onClose($ws, $fd)
    {
        echo "clientid: {$fd}\n";
    }

    public function onTask($serv, $taskId, $workerId, $data)
    {
        var_dump($data);
        // 耗时场景 10s
        sleep(10);
        return "on task finish";    // 告诉worker
    }

    public function onFinish($serv, $taskId, $data)
    {
        echo "TaskId: {$taskId}\n";
        echo "finish-data-success: {$data}\n";
    }
}

$ws = new Ws();