<?php

namespace app\models;

use app\models\Model;


class Product extends Model {
    public $id;
    public $name;
    public $description;
    public $price;



    protected function getTableName() {
        return "Product";
    }

}