<?php

namespace app\models;

use app\models\Model;

class User extends Model
{
    public $id;
    public $login;
    public $pass;

    protected function getTableName() {
        return "User";
    }

}