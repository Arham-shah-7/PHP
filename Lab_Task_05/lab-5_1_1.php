<?php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $price = (float)$_POST['price'];
    $category = trim($_POST['category']);

    // Check if product already exists (to prevent duplicates)
    $exists = false;
    foreach ($_SESSION['products'] as $p) {
        if (
            strtolower($p['name']) == strtolower($name) &&
            $p['price'] == $price &&
            strtolower($p['category']) == strtolower($category)
        ) {
            $exists = true;
            break;
        }
    }

    if (!$exists) {
        $_SESSION['products'][] = [
            "name" => $name,
            "price" => $price,
            "category" => $category
        ];
        echo "<p style='color:green;'>✅ Product added successfully!</p>";
    } else {
        echo "<p style='color:orange;'>⚠ This product already exists!</p>";
    }
}
?>

<h2>Add Product</h2>
<form method="POST">
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <td><strong>Name</strong></td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td><strong>Price (₹)</strong></td>
            <td><input type="number" name="price" required></td>
        </tr>
        <tr>
            <td><strong>Category</strong></td>
            <td><input type="text" name="category" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Add Product">
            </td>
        </tr>
    </table>
</form>

<br>
<a href="lab-5_1_2.php">Go to Filter Products Page</a>
