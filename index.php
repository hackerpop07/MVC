<?php
include "master.php";
include "Controller/ProductController.php";
include "Model/DB_Connection.php";
include "Model/Product.php";
include "Model/ProductsDB.php";
?>

<?php
$controller = new ProductController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

switch ($page) {
    case "delete":
        $controller->delete();
        break;
    case "destroy":
        $controller->destroy();
        break;
    case "create":
        $controller->create();
        break;
    case "store":
        $controller->store();
        break;
    case "searchName":
        $controller->search();
        break;
    case "edit":
        $controller->edit();
        break;
    case "update":
        $controller->update();
        break;
    default:
        $controller->show();
        break;
}
?>
