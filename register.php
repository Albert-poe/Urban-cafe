<!DOCTYPE html>
<html lang="en">
    <head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Cafe Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Register</h1>
    <form action="process_register.php" method="POST" id="registerForm">
        <label>Username</label>

        <input type="text"name="username"id="username"placeholder="Enter Username"required>

        <label>Email</label>

        <input type="email"name="email"id="email"placeholder="Enter Email"required>

        <label>Password</label>
        <input type="password"name="password"id="password"placeholder="Enter Password"required>
       
        <label>Confirm Password</label>

        <input type="password"name="confirm_password"id="confirm_password"placeholder="Confirm Password"required>
        
        <button type="submit">Register</button>
    </form>
    <p>Already have an account?
        <a href="login_page.php">Login here</a>
    </p>
</div>
<script src="register.js"> </script>
</body>
</html>