<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--Bootstrap Link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!--CSS Link-->
	<link rel="stylesheet" type="text/css" href="style.css">
  <!--Fontawsome link-->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<a href="logout.php" style="text-decoration: none;"><h6 style="margin: 56px 0px 0px 436px; color: white;" >LOG OUT</h6></a>


		</div>
	</div>
</div>
<!--Banner container end-->
<!--Navber start-->
<ul class="nav nav-underline" style="padding: 4px 0px 0px 106px;">
  
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">USERS</a>
  </li>
  
</ul>
<br>
<!--Navber end-->
<!--Login welcome session-->
<?php
//Login Welcome session



echo '<div class="alert alert-success alert-dismissible fade show center-block d-block mx-auto w-50 h-25" role="alert">
  <strong>'. $_SESSION['username'] .' Control panel Access granted!</strong> Welcome in your portal :).
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

?>
<!--Login welcome session end-->
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
<a href="add-users.php"><button type="button" class="btn btn-danger btn-lg" style="float: right;">Add users</button></a>
</div>
</div>
<div class="row">
<?php

//include "connect.php";
//$limit = 3;

//$page = $_GET['page'];
//$offset = ($page - 1)* $limit;

//$sql2 = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset}, {$limit}";
//$result2 = mysqli_query($conn, $sql2) or die("Query Unsuccessful");

//if (mysqli_num_rows($result2)>0) { 
//}


?>
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
      $id = $getvar['user_id'];
      $fnm = $getvar['first_name'];
      $lnm = $getvar['last_name'];
      $unm = $getvar['username'];
      $rol = $getvar['role'];

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
      <td class="edit"><a href="update-users.php?id=<?php echo $id; ?>"> <i style='font-size:12px; color: white; font-weight: normal;' class='fas'>&#xf044;</i> </a></td>
      <td class="delete"><a href="delete-users.php?id=<?php echo $id; ?>"><i style="font-size:14px; color: white; font-weight: normal;" class="fa">&#xf014;</i></a> </td>
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
<div class="col-auto ">
<nav aria-label="Page navigation example" >
<?php


$sql1 = "SELECT * FROM user";

$result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful");

if (mysqli_num_rows($result1) > 0) {
  $total_records = mysqli_num_rows($result1);

  $limit = 3;

  $total_page = ceil($total_records / $limit);

  echo '<ul class="pagination">';

  for ($i=1; $i <= $total_page; $i++) { 
    echo '<li class="page-item active px-1"><a class="page-link" href="users.php?page='.$i.'">' .$i. '</a></li>';
  }

echo '</ul>'; 
}




?>
  
    
    
   <!-- <li class="page-item active px-2" ><a class="page-link" href="#">2</a></li> -->
   <!-- <li class="page-item active"><a class="page-link" href="#">3</a></li> -->
    
  </ul>
</nav>
</div>
<div class="col">
</div>
</div>
<!--pagination-->



<!--Javascript Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</div>
</body>
</html>