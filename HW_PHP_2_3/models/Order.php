<?php

namespace app\models;

use app\models\Model;


class Order extends Model {
    public $id;
    public $name;
    public $count;
    public $price;

    public function __construct($name = null, $count = null, $price = null)
    {
        $this->name = $name;
        $this->count = $count;
        $this->price = $price;
    }
    protected function getTableName() {
        return "orders";
    }

}