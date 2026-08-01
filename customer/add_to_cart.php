<?php

session_start();

$item_id = $_GET['id'];

if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = [];
}

if(isset($_SESSION['cart'][$item_id]))
{
    $_SESSION['cart'][$item_id]++;
}
else
{
    $_SESSION['cart'][$item_id] = 1;
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;