<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--Bootstrap Link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!--CSS Link-->
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
<!--Banner container start-->
<!--</body>-->

<?php
include "header.php";
?>

<?php
include "connect.php";

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 bg-danger" style="padding: 24px 0px 25px 104px;">
			<img src="https://png.pngtree.com/template/20190810/ourmid/pngtree-playful-colorful-abstract-flower-kids-kindergarten-logo-sign-symbol-icon-image_292185.jpg" style="padding: 0px 0px 0px 0px; width: 137px; height: 90px; border: 3px solid black;">
		</div>
		<div class="col-md-6 bg-danger">
			<a href="" style="text-decoration: none;"><h6 style="margin: 56px 0px 0px 436px; color: white;" >LOG OUT</h6></a>


		</div>
	</div>
</div>
<!--Banner container end-->
<!--Navber start-->
<ul class="nav nav-underline" style="padding: 4px 0px 0px 106px;">
  
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="users.php">USERS</a>
  </li>
  
</ul>
<br>


<!--Navber end-->
<?php
//Input configure 


if (isset($_POST['submit'])) {
	$fnm = mysqli_real_escape_string($conn, $_POST['fname']);
	$snm = mysqli_real_escape_string($conn,$_POST['lname']);
	$unm = mysqli_real_escape_string($conn,$_POST['uname']);
	$pnm = mysqli_real_escape_string($conn,md5($_POST['pname']));
	$scl = mysqli_real_escape_string($conn,$_POST['sclass']);

	$sql = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('$fnm','$snm','$unm','$pnm','$scl')";
	$ins = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$fnm = mysqli_real_escape_string($conn, $_POST['fname']);
	$snm = mysqli_real_escape_string($conn, $_POST['lname']);
	$unm = mysqli_real_escape_string($conn, $_POST['uname']);
	$pnm = mysqli_real_escape_string($conn, $_POST['pname']);
	$scl = mysqli_real_escape_string($conn, $_POST['sclass']);

	 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Namaste! '.$fnm.' '.$snm.'</strong> Your Registration is successful.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';;
}

?>

<!--Form start-->
<div class="container">
	<div class="row bg-secondary" style="border-radius: 6px;">
		<form class="form" action="add-users.php" method="POST">
 	<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">First Name</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="First Name" name="fname">
	</div>
  
  <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Last Name</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Last Name" name="lname">
	</div>
	<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">User Name</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="User Name" name="uname">
	</div>

	<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="font-weight: bolder;">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pname">
  	</div>

  <label for="exampleInputPassword1" class="form-label" style="font-weight: bolder;">User role</label>
  <select class="form-select" aria-label="Default select example" name="sclass">
  
  <option value="1">Normal User</option>
  <option value="2">Admin</option>
  <option value="3">Employee</option>
	</select>
	<br>
	
  <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
  <br>
	<br>
</form>
	</div>
</div>


<!--Form end-->
<!--Javascript Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>