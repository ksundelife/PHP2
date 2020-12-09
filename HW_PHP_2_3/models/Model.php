<?php


namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{


    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function getOne($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ["id" => $id], static::class);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);

    }

    public function insert() {

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[$key] = $value;

            $keys = implode("`, `", array_keys($params));
            $values = implode(", :", array_keys($params));
            $sqlStr = "(`$keys`)" . " VALUES " . "(:$values)";

            $sql = "INSERT INTO {$this->getTableName()}" . $sqlStr;
        }
        var_dump($sql);
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function update() { //Очень хочется сделать универсальный - но пока так
        $sql = "UPDATE {$this->getTableName()} SET name = :name, description = :description WHERE id = :id";
        Db::getInstance()->queryObject($sql, ["id" => $this->id, "name"=> $this->name, "description"=> $this->description], "{$this->getTableName()}");
    }

    public function delete() {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        Db::getInstance()->execute($sql, ["id" => $this->id]);
    }

    abstract protected function getTableName();
}