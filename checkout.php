<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $productID = $_POST['itemid'];
    $productName = $_POST['itemname'];
    $productPrice = $_POST['itemprice'];
    $productColor = $_POST['itemcolor'];
    $productSize = $_POST['itemsize'];
    $productQuantity = $_POST['itemquantity'];
    $cartItem = [
        'id' => $productID,
        'name' => $productName,
        'price' => $productPrice,
        'color' => $productColor,
        'size' => $productSize,
        'quantity' => $productQuantity,
    ];
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    $found = false;
    foreach($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId && $item['color'] == $productColor && $item['size'] == $productSize) {
            $item['quantity'] += $productQuantity;
            $found = true;
            break;
        }
    }
    if (!$found){
        $_SESSION['cart'][] = $cartItem;
    }
    header("Location: cart.php");
    exit();
}
?>