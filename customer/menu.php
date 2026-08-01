<?php
include("../db.php");

$table = $_GET['table'] ?? 0;

$sql = "
SELECT
    menu_items.*,
    categories.category_name
FROM menu_items
JOIN categories
ON menu_items.category_id = categories.category_id
WHERE menu_items.available = 1
ORDER BY categories.category_name, menu_items.item_name
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Urban Brew</title>

<style>

body{
    font-family:Arial;
    background:#f7f4ef;
    margin:0;
}

header{
    background:#3d2f25;
    color:white;
    padding:20px;
}

.container{
    width:1100px;
    margin:auto;
}

.table-box{
    background:#e8d7b6;
    color:#333;
    padding:12px;
    margin:20px 0;
    border-radius:8px;
    font-weight:bold;
}

.grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.card{
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.content{
    padding:15px;
}

.price{
    color:green;
    font-weight:bold;
    font-size:18px;
}

.category{
    color:#a76c1e;
    font-size:13px;
    text-transform:uppercase;
}

button{
    width:100%;
    padding:12px;
    margin-top:10px;
    background:#3d2f25;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

</style>

</head>

<body>

<header>

<div class="container">

<h1>Urban Brew</h1>

</div>

</header>

<div class="container">

<div class="table-box">

🍽 Ordering From Table <?= htmlspecialchars($table) ?>

</div>

<div class="grid">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="card">

<img src="../uploads/menu/<?= htmlspecialchars($row['image']) ?>">

<div class="content">

<div class="category">

<?= htmlspecialchars($row['category_name']) ?>

</div>

<h3>

<?= htmlspecialchars($row['item_name']) ?>

</h3>

<p>

<?= htmlspecialchars($row['description']) ?>

</p>

<div class="price">

$<?= number_format($row['price'],2) ?>

</div>

<a
href="add_to_cart.php?id=<?= $row['item_id']; ?>"

style="
display:block;
text-align:center;
background:#3d2f25;
color:white;
padding:12px;
text-decoration:none;
border-radius:5px;
margin-top:10px;
">

+ Add To Order

</a>

</div>

</div>

<?php } ?>

</div>
<div style="float:right">

<a href="cart.php?table<?= $table?>" style="color:white; text-decoration:none; font-weight:bold;">

🛒 Cart

</a>

</div>
</div>

</body>

</html>