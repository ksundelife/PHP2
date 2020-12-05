<?php

namespace app\models;

use app\models\Model;


class Basket extends Model {
    public $id;
    public $name;
    public $count;
    public $price;

    protected function getTableName() {
        return "Basket";
    }

}