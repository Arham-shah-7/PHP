<?php
session_start();
if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
    echo "<p style='color:red;'>No products available. Please <a href='lab-5_1_1.php'>add products</a> first.</p>";
    exit;
}

$filteredProducts = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $priceLimit = (float)$_POST['price_limit'];

    foreach ($_SESSION['products'] as $product) {
        if ($product['price'] > $priceLimit) {
            $filteredProducts[] = $product;
        }
    }

    // Remove duplicates (based on name+price+category)
    $uniqueProducts = [];
    foreach ($filteredProducts as $p) {
        $key = strtolower($p['name']) . $p['price'] . strtolower($p['category']);
        $uniqueProducts[$key] = $p;
    }
    $filteredProducts = array_values($uniqueProducts);
}
?>

<h2>Filter Products by Price</h2>
<form method="POST">
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <td><strong>Price Limit (₹)</strong></td>
            <td><input type="number" name="price_limit" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Filter">
            </td>
        </tr>
    </table>
</form>

<?php
if (!empty($filteredProducts)) {
    echo "<h3>Products with Price Greater than ₹" . htmlspecialchars($_POST['price_limit']) . ":</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr style='background-color: #f2f2f2;'>
                <th>Name</th>
                <th>Price (₹)</th>
                <th>Category</th>
            </tr>";
    foreach ($filteredProducts as $product) {
        echo "<tr>
                <td>" . htmlspecialchars($product['name']) . "</td>
                <td>" . htmlspecialchars($product['price']) . "</td>
                <td>" . htmlspecialchars($product['category']) . "</td>
              </tr>";
    }
    echo "</table>";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p style='color:red;'>No products found above ₹" . htmlspecialchars($_POST['price_limit']) . ".</p>";
}
?>

<br>
<a href="lab-5_1_1.php">Add More Products</a>
