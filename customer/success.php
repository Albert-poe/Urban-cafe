<?php

$order = $_GET['order'];

?>

<!DOCTYPE html>

<html>

<head>

<title>Order Successful</title>

</head>

<body>

<h1>🎉 Thank You!</h1>

<h2>Your Order Has Been Placed.</h2>

<p>

Order Number:

<b>#<?= $order ?></b>

</p>

<p>

Please wait while we prepare your order.

</p>

</body>

</html>