<?php
namespace app\model;

require_once 'model.php'

use PDO;
class mytable extends model
{
    private $name = 'mytable';

    public function __construct() {
        $dbms = 'sqlite';
        parent:: __construct($dbms); // model.php の コンストラクタを呼び出し DBMS に接続
    }

    public function getAll():array {
        $sql = <<< EOF
                   SELECT *
                   FROM {$this->name}
                   EOF;
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll();
        } catch(Exception $e) {
            $this->Logging($e->getMessage());
        }
        return $rs;
    }

    public function insert(array $params) {
        $sql = <<< EOF
                   INSERT INTO {$this->name} (
                       name
                   ) VALUES (
                       :name
                   )
                   EOF;
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $param['name'], PDO::PARAM_STR);
            $stmt->execute();
        } catch(Exception $e) {
            $this->logging($e->getMessage());
        }
    }

    public function delete(array $param) {
        $sql = <<< EOF
                   DELETE FROM ($this->name}
                   WHERE id = :id
                   EOF;
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $param['name'], PDO::PARAM_INT);
            $stmt->execute();
        } catch(Exception $e) {
            $this->logging($e->getMessage());
        }
    }
}
