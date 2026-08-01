    <?php
include("../db.php");

$sql = "
SELECT
    menu_items.*,
    categories.category_name
FROM menu_items
JOIN categories
ON menu_items.category_id = categories.category_id
ORDER BY item_id DESC
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Menu</title>

<style>

body{
    font-family:Arial;
    margin:40px;
}

table{
    border-collapse:collapse;
    width:100%;
}

table,th,td{
    border:1px solid #ccc;
}

th,td{
    padding:10px;
}

img{
    width:80px;
}

</style>

</head>

<body>

<h2>Menu Items</h2>

<p>

<a href="dashboard.php">Dashboard</a>

|

<a href="add_item.php">+ Add Item</a>

</p>

<table>

<tr>

<th>Image</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td>

<?php if($row['image']){ ?>

<img src="../uploads/menu/<?= $row['image']; ?>">

<?php } ?>

</td>

<td><?= htmlspecialchars($row['item_name']); ?></td>

<td><?= htmlspecialchars($row['category_name']); ?></td>

<td>$<?= number_format($row['price'],2); ?></td>

</tr>

<?php } ?>

</table>

</body>

</html>