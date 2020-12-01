<?php
// 2. Реализуйте класс Db, который обеспечивает реализацию следующих цепочек:
// echo $db->table('user')->first(3);
// выведет SELECT * FROM user WHERE id = 3
// echo $db->table('product')->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->get();
// что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5
// (конструктор запросов).

class Db {
    protected $tableName;

    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function first($id) {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        return $sql;
    }

    public function get() {
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($this->wheres)) $sql .= " WHERE ";
        foreach ($this->wheres as $value) {
            $sql .= $value['field'] . " = " . $value['value'];
            if ($value != end($this->wheres)) $sql .= " AND ";
        }
        $this->wheres = [];
        return $sql . "<br>";
    }

    public function where($field, $value) {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }
    
    public function andWhere($field, $value) {
        return $this->where($field, $value);
    }
}

$db = new Db();
echo $db->table('product')->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->get();
echo $db->table('product')->get();
echo $db->table('user')->first(3);


