<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
    .sec {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }
    </style>
</head>

<body>
    <section class="sec">
        <h1 style="color:#9b59b6;">CERITANYA HALAMAN ADMIN</h1>
        <a href="logout.php">Logout</a>
    </section>
</body>

</html>