<?php
session_start();
include("../db.php");

$cart = $_SESSION['cart'] ?? [];
$table=$_GET['table'] ?? 0;

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>

    <style>
        body{
            font-family:Arial;
            background:#f4f4f4;
            margin:40px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        th,td{
            padding:12px;
            border:1px solid #ddd;
            text-align:center;
        }

        img{
            width:80px;
        }

        .btn{
            padding:8px 15px;
            background:#3d2f25;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

        h2{
            margin-bottom:20px;
        }
    </style>

</head>

<body>

<h2>Your Order</h2>

<table>

<tr>

<th>Image</th>
<th>Item</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>

</tr>

<?php

foreach($cart as $id=>$qty){

$result=mysqli_query($conn,
"SELECT * FROM menu_items WHERE item_id='$id'");

$item=mysqli_fetch_assoc($result);

$subtotal=$item['price']*$qty;

$total+=$subtotal;

?>

<tr>

<td>

<img src="../uploads/menu/<?= $item['image']; ?>">

</td>

<td>

<?= htmlspecialchars($item['item_name']); ?>

</td>

<td>

$<?= number_format($item['price'],2); ?>

</td>

<td>

<a href="update_cart.php?id=<?= $id ?>&action=minus">➖</a>

<?= $qty ?>

<a href="update_cart.php?id=<?= $id ?>&action=plus">➕</a>
</td>

<td>

$<?= number_format($subtotal,2); ?>

</td>

</tr>

<?php } ?>

<tr>

<td colspan="4">

<b>Grand Total</b>

</td>

<td>

<b>$<?= number_format($total,2); ?></b>

</td>

</tr>

</table>

<br>

<a class="btn" href="checkout.php?table= $table?>">

← Continue Ordering

</a>

</body>

</html>