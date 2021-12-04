<?php

use JetBrains\PhpStorm\Pure;

/**
 * 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов
 * продукт, ценник, посылка и т.п.
 *
 * 2. Описать свойства класса из п.1 (состояние).
 *
 * 3. Описать поведение класса из п.1 (методы).
 *
 * 4. Придумать наследников класса из п.1. Чем они будут отличаться?
 */
class Product
{
    public int $id;
    public int $category;
    public string $name;
    public string $description;
    public string $article;
    public bool $status;
    public float $price;
    public int $balance;

    public function __construct($category, $name, $article, $description,$price,$balance,$status)
    {
        $this->category =$category;
        $this->name =$name;
        $this->article =$article;
        $this->description =$description;
        $this->price =$price;
        $this->balance =$balance;
        $this->status =$status;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }
}

/*Наследник класса*/
class ProductItem extends Product
{
    public  mixed $discount;

//    #[Pure] function __construct ($category, $name, $article, $description, $price, $balance, $status)
//    {
//        parent::__construct($category, $name, $article, $description,$price,$balance,$status);
//        $this->discount =$discount;
//    }
//    private $getDiscountPrice;


     #[Pure] public function getDiscountPrice(): float
    {
        $p = $this->getPrice();
        return $p / 1.3;
    }

    public function view ()
    {
        $discountPrice = round($this->getDiscountPrice() , 0 , PHP_ROUND_HALF_UP);
        $sts=$this->status == 1? "Опубликован": "Не Опубликован";
        //var_dump($this->description);
        $desc =!empty($this->description)? $this->description:'Описание готовится';


        echo "
            <hr><h2>Карточка товара</h2>
            <b>Артикул:</b> $this->article<br>
            <b>Категория:</b> $this->category<br>
            <b>Наименование:</b> $this->name<br>
            <b>Описание:</b> $desc<br>
            <b>Цена:</b> $this->price руб.<br>
            <b>Цена со скидкой:</b> $discountPrice руб.<br>          
            <b>Опубликован:</b> $sts <br>
            <b>Количество на складе:</b> $this->balance шт.<br>
        ";
    }
}

$good = new ProductItem(5186, "SANITA Унитаз - компакт (АТТИКА - Люкс)", 'X9109799', "123" , 4200, 2, 1 );
$good->view();
//$good->getDiscountPrice();
//var_dump(getDiscountPrice());
//print_r($good);
