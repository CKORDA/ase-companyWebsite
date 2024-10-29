<?php
// edit.php

// Read the products from the JSON file
$productsFile = '../../data/data.json';
$products = json_decode(file_get_contents($productsFile), true);

// Check if the product id is set
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Find the product with the given id
    foreach ($products['productsAndServices'] as &$product) {
        if ($product['name'] === $productId) {
            $currentProduct = &$product;
            break;
        }
    }
    
    // If product is not found, display an error
    if (!isset($currentProduct)) {
        echo "Error: Product not found.";
        exit;
    }
} else {
    echo "Error: No product ID provided.";
    exit;
}

// Handle form submission for updating the product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update product details with the form values
    $currentProduct['name'] = $_POST['name'];
    $currentProduct['description'] = $_POST['description'];

    // Write the updated products back to the JSON file
    file_put_contents($productsFile, json_encode($products, JSON_PRETTY_PRINT));

    // Redirect back to the index page after update
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    
    <form action="edit.php?id=<?php echo urlencode($currentProduct['name']); ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($currentProduct['name']); ?>" required>
        <br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($currentProduct['description']); ?></textarea>
        <br>
        
        <input type="submit" value="Update Product">
    </form>

    <a href="index.php">Back to Product List</a>
</body>
</html>
