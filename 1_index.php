<?php
// 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: 
// продукт, ценник, посылка и т.п. или любой другой области.
// Опишите свойства и методы, придумайте наследника, 
// расширяющего функционал родителя.
// Приведите пример использования.

class Product
{
    protected $name;
    protected $id;
    protected $price;
    protected $size;
    protected $frame;
    protected $color;
    protected $weight;
    

    function __construct($name, $id, $price, $size, $frame, $color, $weight)
    {
        $this->name = $name;
        $this->id = $id;
        $this->price = $price;
        $this->size = $size;
        $this->frame = $frame;
        $this->color = $color;
        $this->weight = $weight;
        
    }

    public function prepareView()
    {
        return 
            "
                <br>{$this->name}<br>
                Артикул: {$this->id}<br>
                Цена: {$this->price} р<br>
                Размеры (ШхВхГ, см): {$this->size}<br>
                Материал каркаса: {$this->frame}<br>
                Цвет: {$this->color}<br>
                Вес: {$this->weight} кг<br>
            ";
    }

    public function view()
    {
        echo $this->prepareView();
    }

}

class Sofas extends Product
{
    public $corner;
    public $upholstery;

    public function __construct($name, $id, $price, $size, $frame, $color, $weight, $corner, $upholstery)
    {
        parent::__construct($name, $id, $price, $size, $frame, $color, $weight);
        $this->corner = $corner;
        $this->upholstery = $upholstery;
    }

    public function view()
    {
        parent::view();
        echo 
            "
               Тип угла: {$this->corner}<br>
               Материал обивки: {$this->upholstery}<br>
            ";
    }

}


$product = new Product("Тумба прикроватная", 1, 2000, "50x67x49", "ЛДСП", "Бежевый/ Дуб феррара", 38);
$product->view();

$sofas = new Sofas("Угловой Диван", 2, 16000, "160x90x100", "Массив", "Коричневый", 98, "Левый", "Рогожка");
$sofas->view();

//var_dump($product);