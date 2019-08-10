<?php


use Model\DB_Connection;
use Model\ProductsDB;
use Model\Product;

class ProductController
{
    public $productsDB;

    public function __construct()
    {
        $dns = "mysql:host=localhost;dbname=products";
        $user = "root";
        $password = "";
        $db_connection = new DB_Connection($dns, $user, $password);
        $this->productsDB = new ProductsDB($db_connection->connect());

    }

    public function show()
    {
        $products = $this->productsDB->getAll();
        include "view/list.php";
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $product = $this->productsDB->getProduct($id);
            include "view/delete.php";
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $this->productsDB->destroy($id);
            header('Location: index.php');

        }

    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $keyword = $_POST['keyword'];
            $products = $this->productsDB->search($keyword);
            header('Location: index.php');
        }

    }

    public function create()
    {
        include "view/create.php";
    }

    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $description = $_POST['description'];
            $product = new Product($name, $price, $qty, $description);
            $this->productsDB->create($product);
            include "view/create.php";


        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $product = $this->productsDB->getProduct($id);
        include "view/update.php";

    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $description = $_POST['description'];
            $id = $_GET['id'];
            $product = new Product($name, $price, $qty, $description);
            $product->id = $id;
            $this->productsDB->update($product);
            header('Location: index.php');
        }
    }
}