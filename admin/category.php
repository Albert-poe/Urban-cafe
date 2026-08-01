<?php
include("../db.php");

$result = mysqli_query($conn, "SELECT * FROM categories ORDER BY category_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories</title>

    <style>

        body{
            font-family:Arial;
            margin:40px;
        }

        table{
            border-collapse:collapse;
            width:600px;
        }

        table,th,td{
            border:1px solid #ccc;
        }

        th,td{
            padding:10px;
        }

        a{
            text-decoration:none;
        }

    </style>

</head>
<body>

<h2>Manage Categories</h2>

<p>
    <a href="dashboard.php">Dashboard</a> |
    <a href="add_categories.php">+ Add Category</a>
</p>

<table>

<tr>
    <th>ID</th>
    <th>Category Name</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['category_id']; ?></td>

<td><?= htmlspecialchars($row['category_name']); ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>