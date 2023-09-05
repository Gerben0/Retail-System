<?php
require_once 'ItemsModel.php';

class ItemsController {
    private $model;

    public function __construct($pdo) {
        $this->model = new ItemsModel($pdo);
    }

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