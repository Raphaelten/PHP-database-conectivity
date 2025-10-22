<?php
session_start();
include("connction.php");

if (isset($_POST['submit'])) {

 $username = $_POST['user'];
 $password = $_POST['pass'];

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $roll = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: Admin.php");
        exit(); 
    } else {
        echo '<script>alert("Login failed. Invalid username or password");</script>';
        header("refresh:1; url= index.php");
    }
}
?>
