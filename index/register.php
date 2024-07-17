<?php
$conn = mysqli_connect('localhost', 'root', 'Yahya123#', 'rfid_scanner');

if(isset($_POST["register"])){
    $username = strtolower(stripcslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

    $ress = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
    if(mysqli_fetch_assoc($ress)){
        echo "<script>alert('Username $username Sudah Dipakai');</script>";
        exit;
    }

    if($password !== $password2){
      echo "<script> alert('Konfimasi Password Tidak Sesuai'); </script>";
      exit;
    }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");


        if($query){
            echo "<script> alert('Pendaftaran Berhasil'); window.location.href = 'login.php'; </script>";
        }else{
            mysqli_error($conn);
        }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="post">
        <h1>Registrasi</h1>
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
                <label for="password2">Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>