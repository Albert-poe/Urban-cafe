<?php

 include "db.php";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

     if ($password != $confirm_password) {
        die("Passwords do not match.");
    }

     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

     $check = "SELECT id FROM users WHERE email = ?";

    $stmt = mysqli_prepare($conn, $check);

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {

        die("Email already exists.");

    }

    mysqli_stmt_close($stmt);

     $sql = "INSERT INTO users (username, email, password)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashed_password);

    if (mysqli_stmt_execute($stmt)) {

        header("Location: login_page.php");
        exit();

    } else {

        echo "Registration Failed.";

    }

    mysqli_stmt_close($stmt);

    mysqli_close($conn);

}

?>