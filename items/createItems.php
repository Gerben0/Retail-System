<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
    <link rel= "stylesheet" href ="style.css">
</head>
<body>
    
    <div class="backButtonItems">
        <form action="itemsIndex.php" method="post">
            <button type="submit" name="backButton" id="backButton" value="backButton" class="bButton">Back</button>
        </form>
    </div>

    <h1>Create new item</h1>

    <form action="itemsIndex.php" method="post">
        <div class="createItemOverview">
            
            <div class="itemTitle">
                <h3>Title</h3>
                <input type="text" id="itemTitle" name="itemTitle" placeholder="" value="">
            </div>
            <div class ="itemBarcode"> <!-- TO DO: Create error when input is longer than 13 digits (or disable using JS?) -->
                <h3>Barcode</h3>
                <input type="number" id="itemBarcode" name="itemBarcode" placeholder="" value="">
            </div>
            <div class="itemInventory">
                <h3>Inventory</h3>
                <input type="number" id="itemInventory" name="itemInventory" placeholder="" value="">
            </div>
            <div class="itemRetailPrice"> <!-- TO DO: convert dot to comma (or the other way around?) -->
                <h3>Retail price</h3>
                <input type="number" id="itemRetailPrice" name="itemRetailPrice" step="0.01" placeholder="" value="">
            </div>
            <div class="itemDefaultCost"> <!-- TO DO: convert dot to comma (or the other way around?) -->
                <h3>Default cost</h3>
                <input type="number" id="itemDefaultCost" name="itemDefaultCost" step="0.01" placeholder="" value="">
            </div>
            <div class="itemTax"> <!-- TO DO: make option values dynamic from options set in tax table -->
                <h3>Tax rate</h3>
                <select name="itemTax" id="itemTax">
                    <option value="testTax">Test tax</option>
                </select>
            </div>
            <div class="itemDescription">
                <h3>Description</h3>
                <textarea name="itemDescription" id="itemDescription" placeholder=""></textarea>
            </div>
            <div class="itemVendor"> <!-- TO DO: make option values dynamic from options set in vendor table -->
                <h3>Vendor</h3>
                <select name="itemVendor" id="itemVendor">
                    <option value="testVendor">Test vendor</option>
                </select>
            </div>

        </div>

        <div class="addItem">
            <input type="submit" id="addItem" name="addItem" class="addItem" value="Add item">
        </div>

    </form>

</body>
</html>