<?php
include("../db.php");

if(isset($_POST['save']))
{
    $category = trim($_POST['category_name']);

    if($category != "")
    {
        mysqli_query($conn,
        "INSERT INTO categories(category_name)
        VALUES('$category')");

        header("Location: category.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Category</title>
</head>

<body>

<h2>Add Category</h2>

<form method="POST">

<label>Category Name</label>

<br><br>

<input
type="text"
name="category_name"
required>

<br><br>

<button name="save">

Save Category

</button>

</form>

</body>
</html>