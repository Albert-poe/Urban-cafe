<?php

session_start();
include("../db.php");

$table = $_GET['table'];

$cart = $_SESSION['cart'] ?? [];

if(empty($cart))
{
    die("Cart is empty.");
}

$total = 0;

foreach($cart as $id=>$qty)
{
    $item = mysqli_fetch_assoc(
        mysqli_query($conn,
        "SELECT * FROM menu_items WHERE item_id='$id'")
    );

    $total += $item['price'] * $qty;
}

mysqli_query($conn,
"INSERT INTO orders(table_id,total)
VALUES('$table','$total')");

$order_id = mysqli_insert_id($conn);

foreach($cart as $id=>$qty)
{
    $item = mysqli_fetch_assoc(
        mysqli_query($conn,
        "SELECT * FROM menu_items WHERE item_id='$id'")
    );

    mysqli_query($conn,
    "INSERT INTO order_items
    (order_id,item_id,quantity,price)

    VALUES

    ('$order_id',
     '$id',
     '$qty',
     '{$item['price']}')");
}

unset($_SESSION['cart']);

header("Location: success.php?order=".$order_id);
exit;