<?php
session_start();
$conn = mysqli_connect('localhost', 'root', 'Yahya123#', 'rfid_scanner');
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ress = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($ress)===1){
        $row = mysqli_fetch_assoc($ress);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"] = true;
            header("Location:admin.php");
            exit;
        }
    }
    $error = true;
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
</head>

<body>
    <form action="" method="post">
        <h1>Login</h1>
        <?php if(isset($error)): ?>
        <p class="error">Username / Password Salah</p>
        <?php endif; ?>
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <a href="register.php">Register</a>
        </ul>
    </form>
</body>

</html>