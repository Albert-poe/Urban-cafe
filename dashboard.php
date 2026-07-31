<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login_page    .php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>
Welcome,
<?php  
echo $_SESSION["username"];
 ?>
</h1>
<p>
You have successfully logged in.
</p>
<br>
<a href="logout.php">
<button>Logout</button>
</a>
</div>
</body>
</html>