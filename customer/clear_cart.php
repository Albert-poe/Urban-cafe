<?php

session_start();

unset($_SESSION['cart']);

header("Location: cart.php");
<a class="btn" href="clear_cart.php">

Clear Cart

</a>