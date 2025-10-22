<?php
session_start();
include("connction.php"); 

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('User added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding user.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add User</title>
<style>
body {
  background-color: gray ;
  font-family: Arial, sans-serif;
  text-align: center;
  padding-top: 50px;
}
form {
  background: white;
  display: inline-block;
  padding: 20px;
  border-radius: 8px;
}
input {
  margin: 10px;
  padding: 8px;
  width: 200px;
}
#btn {
  background-color: blue;
  color: white;
  border: none;
  padding: 8px 16px;
  cursor: pointer;
}
#btn:hover {
  background-color: darkblue;
}
</style>
</head>
<body>

<h1>Add New User</h1>

<form action="" method="POST">
  <label>Username:</label><br>
  <input type="text" name="username" required><br>
  
  <label>Password:</label><br>
  <input type="password" name="password" required><br>

  <input type="submit" id="btn" value="Register" name="register">
</form>

</body>
</html>
