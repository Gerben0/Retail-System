<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = '127.0.0.1';
$db   = 'retail_system';
$user = 'admin_retail_system';
$pass = 'admin_retail_system';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

require_once('ItemsModel.php');

$model = new ItemsModel($pdo);

class ItemsController {
    private $model;

    public function __construct($pdo) {
        $this->model = new ItemsModel($pdo);
    }

    // Get item information
    public function getItemInfo() {
        $items = [];
        // Check if a search query has been submitted
        if (isset($_GET['search'])) {
            $searchQuery = htmlspecialchars($_GET['search']);
            $items = $this->model->searchItems($searchQuery);
        } else {
            // If no search query, retrieve all items
            $items = $this->model->getAllItems();
        }
        include('itemsIndex.php');
    }

    // Create item
    public function addItem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addItem'])) {
            $itemTitle = $_POST['itemTitle'];
            $itemBarcode = $_POST['itemBarcode'];
            $itemInventory = $_POST['itemInventory'];
            $itemRetailPrice = $_POST['itemRetailPrice'];
            $itemDefaultCost = $_POST['itemDefaultCost'];
            $itemTax = $_POST['itemTax'];
            $itemDescription = $_POST['itemDescription'];
            $itemVendor = $_POST['itemVendor'];

            if ($this->model->addItem($itemTitle, $itemBarcode, $itemInventory, $itemRetailPrice, $itemDefaultCost, $itemTax, $itemDescription, $itemVendor)) {
                echo "Item added successfully!";
                header('location: itemsIndex.php');
                exit();
            } else {
                // TO DO: Add verification failures
                echo "Failed to add item.";
            }
        }
    }
}

// Call item information function
$controllerGet = new ItemsController($pdo);
$controllerGet->getItemInfo();

// Call create item function
$controllerAdd = new ItemsController($pdo);
$controllerAdd->addItem();
