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
<!--Edit form start-->
<div class="container-fluid">
	<div class="row">
		<div class="col-4">
		</div>
		<!--Form start-->
		<?php
		//Step 1: echoing data from database
		$id = $_REQUEST['id'];
		$sql = "SELECT * FROM `user` WHERE user_id = $id ";

		$result = mysqli_query($conn, $sql) or die("Query Failed");

		while ($getvar = mysqli_fetch_array($result)) {
      	$sid = $getvar['user_id'];
      	$fnm = $getvar['first_name'];
      	$lnm = $getvar['last_name'];
      	$unm = $getvar['username'];
      	$rol = $getvar['role'];
      

		?>
		<!--Step 2: Echo data in form-->
		<div class="col-4 bg-secondary">
			<form class="form" action="" method="POST">
 				<div class="mb-3">
 					<input type="hidden" name="id1" value="<?php echo $sid;  ?>">
 				 <label for="formGroupExampleInput" class="form-label" style="font-weight: bolder;">First Name</label>
  					<input type="text" class="form-control" id="formGroupExampleInput" name="fname1" value="<?php echo $fnm;  ?>">
				</div>
  
  				<div class="mb-3">
 				 <label for="formGroupExampleInput" class="form-label" style="font-weight: bolder;">Last Name</label>
  					<input type="text" class="form-control" id="formGroupExampleInput" name="lname1" value="<?php echo $lnm;  ?>">
				</div>
				<div class="mb-3">
  					<label for="formGroupExampleInput2" class="form-label" style="font-weight: bolder;">User Name</label>
 					 <input type="text" class="form-control" placeholder="User Name" name="uname1" value="<?php echo $unm;  ?>">
				</div>

				<label for="exampleInputPassword1" class="form-label" style="font-weight: bolder;">User role</label>
  				<select class="form-select" aria-label="Default select example" name="sclass1" value="<?php echo $rol;  ?>">
  				
  				<?php
  				if ($getvar['role'] == 1) {
      	echo "<option value='1' selected>Normal User</option>
      	 				<option value='2'>Admin</option>
      	  				<option value='3'>Employee</option>";
      }
      elseif ($getvar['role'] == 2) {
      	echo "<option value='1'>Normal User</option>
      	 				<option value='2' selected>Admin</option>
      	  				<option value='3'>Employee</option>";
      }
      else {
      	echo "<option value='1'>Normal User</option>
      	 		<option value='2'>Admin</option>
      	  		<option value='3' selected>Employee</option>";
      } 
  
  				?>

				</select>
				
				<br>
	
  				<button type="submit" class="btn btn-primary" name="submit" value="save">Save</button>
  				<br>
				<br>
			</form>
			<?php 
		}

			?>
		</div>
		<!--Form end-->
		<?php
//Step 3: Post updated data   


if (isset($_POST['submit'])) {
	$fnm1 = mysqli_real_escape_string($conn, $_POST['fname1']);
	$snm1 = mysqli_real_escape_string($conn,$_POST['lname1']);
	$unm1 = mysqli_real_escape_string($conn,$_POST['uname1']);
	$scl1 = mysqli_real_escape_string($conn,$_POST['sclass1']);

	$sql1 = "UPDATE `user` SET `first_name`='$fnm1',`last_name`='$snm1',`username`='$unm1',`role`='$scl1' WHERE user_id = {$sid}";
	$ins1 = mysqli_query($conn, $sql1);
	header('location: users.php');
	
}



?>
		<div class="col-4">
		</div>
	</div>
</div>
<!--Edit form end-->

<!--Javascript Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>