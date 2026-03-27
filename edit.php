<?php
session_start();
include("connction.php");
include("function.php");

if (!isset($_SESSION["username"])) {
    header("location:index.php");
    exit;
}
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE ID='$id'");
$user = mysqli_fetch_assoc($result);

if (isset($_POST['save'])) {
    $fname = clean($_POST['fname']);
    $lname = clean($_POST['lname']);
    $email = clean($_POST['email']);
    
     if (!empty($_FILES["fileToUpload"]["name"])) // if user selects image the below should happen
        {
        $target_dir = "images/"; //save image to images folder 
        $image = basename($_FILES["fileToUpload"]["name"]); // get file name form whereever its located
        $target_file = $target_dir . $image; // combines folder name + file name to make full location 
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file); // move from temp folder to images folder 
    } else {
        $image = $user['profile_image']; // if user didnt select image keep old image

    }


    mysqli_query($conn, "UPDATE user SET First_Name='$fname', Last_Name='$lname', Email='$email', profile_image = '$image' WHERE ID='{$_GET['id']}'");

    echo "<script>alert('Updated successfully!'); location='admin.php';</script>";
}

?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: whitesmoke;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    form {
        background: white;
        padding: 20px;
        width: 350px;
        border-radius: 10px;
        box-shadow: 0 0 10px gray;
    }
    h4 {
        text-align: center;
        color: darkslategray;
    }
    label {
        font-weight: bold;
        color: black;
    }
    input {
        width: 100%;
        padding: 10px;
        margin: 6px 0 15px 0;
        border: 1px solid gray;
        border-radius: 5px;
    }
    input:focus {
        border-color: dodgerblue;
        outline: none;
        box-shadow: 0 0 5px skyblue;
    }
    .btn-success {
        background: green;
        color: white;
        border: none;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    .btn-success:hover {
        background: darkgreen;
    }
    .btn-secondary {
        background: gray;
        color: white;
        padding: 8px;
        width: 100%;
        border-radius: 5px;
        text-decoration: none;
        display: block;
        text-align: center;
        margin-top: 10px;
    }
    .btn-secondary:hover {
        background: dimgray;
    }
</style>

<form method="POST" class="p-4" enctype="multipart/form-data"> 
<h4>Edit Your Infomation</h4>

<label>First Name</label>
<input type="text" name="fname" value="<?= $user['First_Name']?>" required class="form-control mb-2">

<label>Last Name</label>
<input type="text" name="lname" value="<?= $user['Last_Name']?>" required class="form-control mb-2">

<label>Email</label>
<input type="email" name="email" value="<?= $user['Email']?>" required class="form-control mb-2">

<label>Profile Image</label>
<input type="file" accept="image/*" name="fileToUpload">


<button name="save" class="btn btn-success mt-2">Save</button>
<a href="admin.php" class="btn btn-secondary mt-2">Back</a>
</form>


