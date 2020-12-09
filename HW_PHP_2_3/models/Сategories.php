<?php

namespace app\models;

use app\models\Model;


class Сategories extends Model {
    public $id;
    public $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }
    protected function getTableName() {
        return "categories";
    }

}