<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once(__DIR__ . '/../includes/dbconnect.php');
require_once 'ItemsModel.php';

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
        include_once('itemsIndex.php');
    }

    // Create item
    public function addItemC() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addItem'])) {
            $itemTitle = $_POST['itemTitle'];
            $itemBarcode = $_POST['itemBarcode'];
            $itemInventory = $_POST['itemInventory'];
            $itemRetailPrice = $_POST['itemRetailPrice'];
            $itemDefaultCost = $_POST['itemDefaultCost'];
            $itemTax = $_POST['itemTax'];
            $itemDescription = $_POST['itemDescription'];
            $itemVendor = $_POST['itemVendor'];

            if ($this->model->addItemM($itemTitle, $itemBarcode, $itemInventory, $itemRetailPrice, $itemDefaultCost, $itemTax, $itemDescription, $itemVendor)) {
                echo "Item added successfully!";
                header('location: itemsIndex.php');
                exit();
            } else {
                // TO DO: Add verification failures
                echo "Failed to add item.";
            }
        }
    }

    public function updateItemC() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateItem'])) {
            $itemId = $_POST['itemId'];
            $itemTitle = $_POST['itemTitle'];
            $itemBarcode = $_POST['itemBarcode'];
            $itemInventory = $_POST['itemInventory'];
            $itemRetailPrice = $_POST['itemRetailPrice'];
            $itemDefaultCost = $_POST['itemDefaultCost'];
            $itemTax = $_POST['itemTax'];
            $itemDescription = $_POST['itemDescription'];
            $itemVendor = $_POST['itemVendor'];

            if ($this->model->updateItemM($itemId, $itemTitle, $itemBarcode, $itemInventory, $itemRetailPrice, $itemDefaultCost, $itemTax, $itemDescription, $itemVendor)) {
                echo "Item updated succesfully!";
                header('location: itemsIndex.php');
                exit();
            } else {
                // TO DO: Add verification failures
                echo "Failed to add item.";
            }
        }
    }

    public function deleteItemC() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteItem'])) {
            $itemId = $_POST['itemId'];
            if ($this->model->deleteItemM($itemId)) {
                echo "Item succesfully deleted!";
                header('location: itemsIndex.php');
                exit();
            } else {
                // TO DO: Add verification failures
                echo "There was an error deleting the item.";
            }
        }
    }
}

$controller = new ItemsController($pdo);
$controller->getItemInfo();
$controller->addItemC();
$controller->updateItemC();
$controller->deleteItemC();
