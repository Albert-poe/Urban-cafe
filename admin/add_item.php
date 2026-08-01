<?php
include("../db.php");

$categories = mysqli_query($conn,"SELECT * FROM categories");

if(isset($_POST['save']))
{

$item=$_POST['item_name'];
$category=$_POST['category'];
$description=$_POST['description'];
$price=$_POST['price'];

$imageName=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file(
$tmp,
"../uploads/menu/".$imageName
);

mysqli_query($conn,"
INSERT INTO menu_items
(category_id,item_name,description,price,image)

VALUES

('$category','$item','$description','$price','$imageName')
");

header("Location:menu_items.php");

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Add Menu Item</title>

</head>

<body>

<h2>Add Menu Item</h2>

<form method="POST" enctype="multipart/form-data">

Name

<br>

<input type="text" name="item_name" required>

<br><br>

Category

<br>

<select name="category">

<?php while($cat=mysqli_fetch_assoc($categories)){ ?>

<option value="<?= $cat['category_id']; ?>">

<?= $cat['category_name']; ?>

</option>

<?php } ?>

</select>

<br><br>

Description

<br>

<textarea name="description" rows="5" cols="50"></textarea>

<br><br>Price
<br>
<input type="number" step="0.01" name="price" required>
<br><br>Image
<br>
<input type="file" name="image" required>

<br><br>

<button name="save">

Save Item

</button>

</form>

</body>

</html>