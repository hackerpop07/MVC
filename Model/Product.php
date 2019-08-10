<?php
namespace Model;

class Product
{
public $name;
public $price;
public $qty;
public $description;
public $id;
public function __construct($name,$price,$qty,$description)
{
    $this->name = $name;
    $this->price = $price;
    $this->qty = $qty;
    $this->description = $description;
}
}