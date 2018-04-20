<?php

/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-16
 * Time: 10:32
 */
class DB
{
    /**
     * 'host' => 'localhost',
     * 'username' => 'root',
     * 'password' => 'root',
     * 'dbname' => ''
     * DB constructor.
     * @param $data
     */
    protected $host;
    protected $username;
    protected $password;
    protected $dbname;
    protected $port;
    protected static $pdo;

    static private $_instance;

    protected function __construct($data)
    {
        $this->host = $data['host'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->dbname = $data['dbname'];
        $this->port = isset($data['port']) ? $data['port'] : 3306;
        try {
            self::$pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};port={$this->port}",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            echo "Database connection failed";
            exit();
        }
    }

    /**
     * 取第一条返回一维数组
     * @param $sql
     * @return array|mixed
     */
    public static function pdoQuery($sql)
    {
        $result = [];

        $res = self::$pdo->query($sql);
        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * 获取所有内容返回二位数组
     * @param $sql
     * @return array
     */
    public static function pdoQueryArray($sql)
    {
        $result = [];

        $res = self::$pdo->query($sql);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public static function getInstance($data)
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self($data);
        }

        return self::$_instance;
    }
}
