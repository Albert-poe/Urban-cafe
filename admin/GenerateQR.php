<?php
include("../db.php");
include("../phpqrcode/qrlib.php");

$table_id = $_GET['id'];

// URL that the QR should open
$url = "http://localhost/URBAN-CAFE/customer/menu.php?table=".$table_id;

// File name
$fileName = "../qr/generated/table_".$table_id.".png";

// Generate QR
QRcode::png($url, $fileName, QR_ECLEVEL_L, 10);

// Save path in database
$path = "qr/generated/table_".$table_id.".png";

mysqli_query($conn,
"UPDATE cafe_tables
SET qr_code='$path'
WHERE table_id='$table_id'");

header("Location: tables.php");
exit;
?>