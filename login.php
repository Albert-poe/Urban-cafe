<?php

session_start();
include "db.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $sql = "SELECT id, username, password FROM users  WHERE email = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)==1){
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password,$user["password"])){
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: dashboard.php");
            exit();
        }
        else{
            echo "Incorrect Password.";
        }
    }
    else{
        echo "Email does not exist.";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>