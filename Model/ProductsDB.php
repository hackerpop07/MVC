<?php

namespace Model;
class ProductsDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = "select * from  products";
        $actionSql = $this->connection->query($sql);
        $allDataProducts = $actionSql->fetchAll();
        $products = [];
        foreach ($allDataProducts as $key => $row) {
            $product = new Product($row['name'], $row['price'], $row['qty'], $row['description']);
            $product->id = $row['id'];
            $products[] = $product;
        }
        return $products;
    }


    public function destroy($id)

    {

        $sql = "DELETE FROM `products` WHERE id = $id";
        $this->connection->query($sql);
    }

    public function getProduct($id)
    {
        $sql = "SELECT * FROM `products` WHERE id = $id";
        $infoProduct = $this->connection->query($sql);
        $row = $infoProduct->fetch();
        $product = new Product($row['name'], $row['price'], $row['qty'], $row['description']);
        $product->id = $row['id'];
        return $product;
    }

    public function search($keyword)
    {
        $sql = "select * from products where name like '%$keyword%'";
        $allSearch = $this->connection->query($sql);
        $products = [];
        if ($allSearch == null) {
            return $products;
        } else {
            foreach ($allSearch as $key => $row) {
                $product = new Product($row['name'], $row['price'], $row['qty'], $row['description']);
                $product->id = $row['id'];
                $products[] = $product;
            }
            return $products;
        }
    }

    public function update($product)
    {
        $id = $product->id;
        $sql = "UPDATE `products` SET `name`=?,`price`=?,`qty`=?,`description`=? where id = $id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->qty);
        $statement->bindParam(4, $product->description);
        $statement->execute();
    }

    public function create($product)
    {
        $sql = "INSERT INTO `products`(`name`, `price`, `qty`, `description`) VALUES (
    ?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->qty);
        $statement->bindParam(4, $product->description);
        $statement->execute();
    }

}