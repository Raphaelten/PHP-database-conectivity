<?php
session_start();
include("connction.php");

// 🔒 Protect page
if (!isset($_SESSION["username"])) {
    header("location:index.php");
    exit();
}

$username = $_SESSION['username'];

// Get profile image
$sqlProfile = "SELECT profile_image FROM user WHERE Username = '$username'";
$resultProfile = mysqli_query($conn, $sqlProfile);
$userProfile = mysqli_fetch_assoc($resultProfile);
$profile = !empty($userProfile['profile_image']) ? $userProfile['profile_image'] : 'default.png';

// Clean function
function clean($anything){
    $anything = trim($anything);
    $anything = ucfirst($anything);
    return $anything;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<style>
body {
  background-color: #fff;
  font-family: 'Times New Roman', Times, serif;
}
.navbar {
  background-color: blue;
  color: #fff;
  padding: 10px 20px;
}
.content { padding:25px; }
.profile-img {
    width:50px;
    height:50px;
    border-radius:50%;
    object-fit:cover;
    margin-right:10px;
}
</style>
</head>

<body>

<nav class="navbar d-flex justify-content-center">
<span class="title">Dashboard</span>
</nav>

<div class="content">

<h3>
Welcome back, 
<img src="images/<?= $profile ?>" class="profile-img">
<?= clean($username); ?>!
</h3>

<p class="text-muted">Here you can manage users.</p>

<div class="row g-2 mt-1">

<div class="col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="card-title text-primary">
<i class="bi bi-people-fill"></i> Add Users
</h5>
<a href="addusers.php" class="btn btn-primary btn-sm">Add</a>
</div>
</div>
</div>

<div class="col-md-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="card-title text-danger">
<i class="bi bi-box-arrow-right"></i> Logout
</h5>
<a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</div>
</div>
</div>

</div>

<hr class="my-4">

<h5 class="mb-3">System Users</h5>

<table class="table table-bordered table-hover align-middle">
<thead>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Username</th>
<th>Email</th>
<th>Edit</th>
<th>Status</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT user.*, status.action 
        FROM user 
        JOIN status ON user.Status = status.id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>
        <td>{$row['ID']}</td>
        <td>{$row['First_Name']}</td>
        <td>{$row['Last_Name']}</td>
        <td>{$row['Username']}</td>
        <td>{$row['Email']}</td>
        <td>
            <a href='edit.php?id={$row['ID']}' 
            class='btn btn-sm btn-warning'>Edit</a>
        </td>
        <td>";

        // Show Status Badge
        if ($row['action'] == 'On') {
            echo "<span class='badge bg-success'>On</span>";
        } else {
            echo "<span class='badge bg-danger'>Off</span>";
        }

        // Only ADMIN can toggle
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

            // Prevent admin from disabling themselves
            if ($row['Username'] != $_SESSION['username']) {

                if ($row['action'] == 'On') {
                    echo " 
                    <a href='toggle_user.php?id={$row['ID']}' 
                    class='btn btn-sm btn-danger ms-2'>
                    Disable
                    </a>";
                } else {
                    echo " 
                    <a href='toggle_user.php?id={$row['ID']}' 
                    class='btn btn-sm btn-success ms-2'>
                    Enable
                    </a>";
                }

            }
        }

        echo "</td></tr>";
    }

} else {
    echo "<tr><td colspan='7' class='text-center'>No users found</td></tr>";
}
?>

</tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>