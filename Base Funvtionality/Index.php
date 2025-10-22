<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
 body { 
  background-color: rgb(255, 255, 255, 1);
  font-family: 'Times New Roman', Times, serif;
  text-align: center;
  padding-top: 50px;
}
form {
  background: white;
  display: inline-block;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
input {
  margin: 10px;
  padding: 8px;
  width: 200px;
}
#btn {
  background-color: rgb(0, 0, 255);
  color: rgb(255, 255, 255);
  border: none;
  padding: 8px 16px;
  cursor: pointer;
}
#btn:hover {
  background-color: rgb(0, 0, 139);
}

</style>
</head>
<body>
<div id="form">
<h1>LOGIN FORM</h1>
<form name="form" action="login.php" method="POST">
<label>Username:</label>
<input type="text" id="user" name="user"><br><br>
<label>Password:</label>
<input type="password" id="pass" name="pass"><br><br>
<input type="submit" id="btn" value="Login" name="submit">
</form>
</div>
</body>
</html>