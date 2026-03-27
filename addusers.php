<?php
session_start();
include("connction.php"); 

if (isset($_POST['register']) && isset($_POST['first_name']) && isset($_POST['last_name'])&& isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) )  {
    $first_name = strtoupper(trim($_POST['first_name']));
    $last_name = strtoupper(trim($_POST['last_name']));
    $username = strtoupper(trim($_POST['username']));
    $password = trim($_POST['password']);
    $email = trim($_POST['email']); 

   if (empty($first_name)) {
        echo "<script>alert('Mwayiwala First Name'); window.location.href = window.location.href;</script>";
        exit;
    } 

    if (empty($last_name)) {
        echo "<script>alert('Mwayiwala Last Name'); window.location.href = window.location.href;</script>";
        exit;
    } 
    if (empty($username)) {
        echo "<script>alert('Mwayiwala User Name'); window.location.href = window.location.href;</script>";
        exit;
    }  
   if (empty($password)) {
        echo "<script>alert('Mwayiwala Password'); window.location.href = window.location.href;</script>";
        exit;
    } 
     if (empty($email)) {
        echo "<script>alert('Mwayiwala Email'); window.location.href = window.location.href;</script>";
        exit;
    } 
    else {

    $sql = "INSERT INTO user (First_Name, Last_Name, Username, Password, Email) VALUES ('$first_name', '$last_name', '$username', '$password', '$email')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('User added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding user.');</script>";
    }
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
  <label>First Name:</label><br>
  <input type="text" name="first_name" placeholder="First Name" required><br>
  
  <label>Last Name:</label><br>
  <input type="text" name="last_name" placeholder="Last Name" required><br>

   <label>User Name:</label><br>
  <input type="text" name="username" placeholder="User Name" required><br>

   <label>Password:</label><br>
  <input type="password" name="password" placeholder="Password" required><br>

  <label>Email:</label><br>
  <input type="Email" name="email" placeholder="Email" required><br>

  <input type="file" name="fileToUpload" id="fileToUpload">
  
  <input type="submit" value="Upload Image" name="submit">

  <input type="submit" id="btn" value="Register" name="register">
</form>

</body>
</html>