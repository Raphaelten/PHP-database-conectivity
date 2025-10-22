<!doctype html>
<?php
session_start();
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<style>
body 
{
  background-color: rgba(255, 255, 255, 1); 
  font-family: 'Times New Roman', Times, serif;
}
.navbar {
  background-color: blue; 
  color: rgba(255, 255, 255, 1); 
  padding: 10px 20px; 
}
.navbar .title {
  font-weight:600; 
  font-size:18px;
}
.content 
{
  padding:25px;
}
.card 
{
  border:none; 
  border-radius:8px; 
  transition: 
  transform 0.2s;
}
.card:hover 
{
  transform: translateY(-3px);
}
.btn-sm 
{
  padding:5px 10px; 
  font-size:14px;
}
.text-primary 
{
  color: rgba(0, 123, 255, 1);}
.text-danger 
{color: rgba(220, 53, 69, 1);}
.footer 
{
  text-align:center; 
  padding:15px; color: rgba(102, 102, 102, 1); 
  font-size:14px; 
  margin-top:30px;
  }
</style>
</head>
<body>
<nav class="navbar d-flex justify-content-center">
<span class="title"> Dashboard</span>
</nav>

<div class="content">
<h3>Welcome back,<?php echo $_SESSION['username']; ?>!</h3>
<p class="text-muted">Here you can add users or log out.</p>
<div class="row g-2 mt-1">
<div class="col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="card-title text-primary"><i class="bi bi-people-fill"></i> Add Users</h5>
<p class="card-text">Add, edit, or remove users from your system.</p>
<a href="addusers.php" class="btn btn-primary btn-sm">Open</a>
</div>
</div>
</div>

<div class="col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="card-title text-danger"><i class="bi bi-box-arrow-right"></i> Logout</h5>
<p class="card-text">Click below to log out.</p>
<a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
