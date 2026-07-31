<?php
include("../db.php");

$result = mysqli_query($conn, "SELECT * FROM cafe_tables");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Tables</title>
</head>

<body>

<h2>Cafe Tables</h2>

<a href="add_table.php">Add New Table</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Table Name</th>
    <th>Status</th>
    <th>QR</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['table_id']; ?></td>

<td><?= $row['table_name']; ?></td>

<td><?= $row['status']; ?></td>

<td>

<?php
if(empty($row['qr_code']))
{
?>

<a href="Generate_QR.php?id=<?= $row['table_id']; ?>">
Generate QR
</a>

<?php
}
else
{
?>

<img
src="../<?= $row['qr_code']; ?>"
width="100">

<br><br>

<a href="../<?= $row['qr_code']; ?>" download>
Download
</a>

<?php
}
?>



</td>

</tr>

<?php } ?>

</table>

</body>
</html>