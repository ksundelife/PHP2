<?php

namespace app\models;

use app\models\Model;


class Order extends Model {
    public $id;
    public $name;
    public $count;
    public $price;

    protected function getTableName() {
        return "Order";
    }

}