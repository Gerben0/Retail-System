<?php

include 'includes/dbconnect.php';

class ItemsModel {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addItem($itemTitle, $itemBarcode, $itemInventory, $itemRetailPrice, $itemDefaultCost, $itemTax, $itemDescription, $itemVendor) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO items (title, barcode, inventory, retail_price, default_cost, tax_rate, description, vendor) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$itemTitle, $itemBarcode, $itemInventory, $itemRetailPrice, $itemDefaultCost, $itemTax, $itemDescription, $itemVendor]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}