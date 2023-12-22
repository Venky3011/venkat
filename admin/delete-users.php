<?php
include "connect.php";

$s_id = $_REQUEST['id'];
$del_sql = "DELETE FROM `user` WHERE user_id = {$s_id}";
$delete = mysqli_query($conn, $del_sql) or die("Query Unsuccessful");

header('location: users.php');


?>
<?php
include "header.php";
?>