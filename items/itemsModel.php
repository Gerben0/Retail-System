<?php

include_once 'ItemsController.php';

class ItemsModel {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    // Get all item information
    public function getAllItems() {
        $query = "SELECT * FROM items";
        $stmt = $this->conn->query($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Search for item by name
    public function searchItems($searchQuery) {
        $query = "SELECT * FROM items WHERE title LIKE :searchQuery";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $searchQuery . '%';
        $stmt->bindParam(':searchQuery', $searchParam, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    // Create items
    public function addItem($itemTitle, $itemBarcode, $itemInventory, $itemRetailPrice, $itemDefaultCost, $itemTax, $itemDescription, $itemVendor) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO items (title, barcode, inventory, retail_price, default_cost, tax_rate, description, vendor) 
            VALUES (:title, :barcode, :inventory, :retail_price, :default_cost, :tax_rate, :description, :vendor)");
            
            $stmt->bindParam(':title', $itemTitle);
            $stmt->bindParam(':barcode', $itemBarcode);
            $stmt->bindParam(':inventory', $itemInventory);
            $stmt->bindParam(':retail_price', $itemRetailPrice);
            $stmt->bindParam(':default_cost', $itemDefaultCost);
            $stmt->bindParam(':tax_rate', $itemTax);
            $stmt->bindParam(':description', $itemDescription);
            $stmt->bindParam(':vendor', $itemVendor);
            
            $stmt->execute();
            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}