// Limit barcode to 13 digits
document.getElementById('itemBarcode').addEventListener('input', function(e) {
    let value = e.target.value;
    if (value.length > 13) {
        e.target.value = value.slice(0, 13);
    }
});
