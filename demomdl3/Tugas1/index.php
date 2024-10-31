<?php
require_once 'src/User.php';
require_once 'src/Product.php';

use App\User;
use App\Product;

// Contoh penggunaan fungsi
$user = new User("Niney", 20, "nileliaa69@gmail.com");
echo "<h3>User Information:</h3>";
$user->displayInfo();

$product = new Product("Laptop", 25000);
echo "<h3>Product Information:</h3>";
$product->displayInfo();
?>
