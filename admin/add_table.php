<?php
include("../db.php");

if(isset($_POST['save']))
{
    $table = $_POST['table_name'];

    mysqli_query($conn,
        "INSERT INTO cafe_tables(table_name)
        VALUES('$table')");

    header("Location: tables.php");
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Add Table</title>
</head>

<body>

<h2>Add Table</h2>

<form method="POST">

<input
type="text"
name="table_name"
placeholder="Table Name"
required>

<br><br>

<button name="save">
Save
</button>

</form>

</body>
</html>