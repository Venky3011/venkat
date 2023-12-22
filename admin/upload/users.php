<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--Bootstrap Link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!--CSS Link-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Fontawesome icon link-->
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<!--Banner container start-->
<?php
include "connect.php";

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 bg-info" style="padding: 24px 0px 25px 104px;">
			<img src="https://logodix.com/logo/701819.png" style="padding: 0px 0px 0px 0px; width: 137px; height: 90px; border: 3px solid black;">
		</div>
		<div class="col-md-6 bg-info">
			<a href="" style="text-decoration: none;"><h6 style="margin: 56px 0px 0px 436px; color: white;" >LOG OUT</h6></a>


		</div>
	</div>
</div>
<!--Banner container end-->
<!--Navber start-->
<ul class="nav nav-underline" style="padding: 4px 0px 0px 106px;">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">POST</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">CATEGORY</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">USERS</a>
  </li>
  
</ul>
<br>
<!--Navber end-->
<?php
//Echo data form table

$sql = "SELECT * FROM `user` ORDER BY user_id DESC ";

$result = mysqli_query($conn, $sql) or die("Query Failed");

if (mysqli_num_rows($result) > 0) {
?>
<!--Table start-->
<div class="container">
<div class="row">
<div class="col">
<h1>All Users</h1>
</div>
<div class="col" id="rel">
<a href="add-users.php"><button type="button" class="btn btn-primary btn-lg" style="float: right;">Add users</button></a>
</div>
</div>
<div class="row">
<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">SL. NO</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USER NAME</th>
      <th scope="col">ROLE</th>
      <th scope="col">EDIT</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	while ($getvar = mysqli_fetch_array($result)) {

  	?>
    <tr>
      <td class="align-middle"><?php echo $getvar['user_id']; ?></td>
      <td class="align-middle"><?php echo $getvar['first_name'] ."  ". $getvar['last_name']; ?></td>
      <td class="align-middle"><?php echo $getvar['username']; ?></td>
      <td class="align-middle"> 
      <?php

      if ($getvar['role'] == 1) {
      	echo "Normal User";
      }
      elseif ($getvar['role'] == 2) {
      	echo "Admin";
      }
      elseif ($getvar['role'] != 2 && 1) {
      	echo "Employee";
      }

      ?> </td>
      <td class="align-middle"> <i class='far fa-edit' style='font-size:24px;color: white'></i> </td>
      <td class="align-middle"> </td>
    </tr>
    <?php
}
    ?>    
  </tbody>
</table>
<?php
}
?>
</div>
<!--Table end-->
<!--pagination-->
<div class="row" >
<div class="col">
</div>
<div class="col">
<nav aria-label="Page navigation example" >
  <ul class="pagination">
    
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item active px-2" ><a class="page-link" href="#">2</a></li>
    <li class="page-item active"><a class="page-link" href="#">3</a></li>
    
  </ul>
</nav>
</div>
<div class="col">
</div>
</div>
<!--pagination-->
</div>
</body>
</html>