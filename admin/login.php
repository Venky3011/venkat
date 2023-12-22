
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
<!--Container-->
<div class="Container-fluid">
  <div class="row">
    <div class="col-4">
    </div>
    <div class="col-4 mt-5">
      <!--Form details-->
      <div class="row">
        <img src="https://png.pngtree.com/template/20190810/ourmid/pngtree-playful-colorful-abstract-flower-kids-kindergarten-logo-sign-symbol-icon-image_292185.jpg" class="img-fluid center-block d-block mx-auto w-50 h-25 border border-3 border-dark">
      </div>
      <div class="row mt-2">
        <h5 class="text-center">Admin Login</h5>
      </div>
      <div class="row bg-secondary py-4">
      <form class="form" action="login.php" method="POST">
        <div class="mb-3">          
            <label for="formGroupExampleInput" class="form-label" style="font-weight: bolder;">Username</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="log_fname">
        </div>
  
          <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label" style="font-weight: bolder;">Password</label>
          <input type="Password" class="form-control" id="formGroupExampleInput" name="log_pass">
          </div>           
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <br>
        <br>
      </form>
    </div>    
    <!--Form details-->
    
    <?php
    //Login setup
    include "connect.php";

    if (isset($_POST['login'])) {
      $log_user = mysqli_real_escape_string($conn, $_POST['log_fname']);
      $log_pass = md5($_POST['log_pass']);     


      $sql = "SELECT user_id,username,role FROM `user` WHERE username = '{$log_user}' && password = '{$log_pass}'";
      $result = mysqli_query($conn, $sql) or die('Query Failed');
      $fetch = mysqli_num_rows($result);

      if ($fetch > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          session_start();
          $_SESSION['username'] = $row['username'];
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['role'] = $row['role'];
          
          header('location: users.php');
                 
               }  
        
      }
      else{
        echo "<br>";
        //echo "$sql";
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Wrong credentials!!!!</strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

      }

    }



    ?>
    </div>
    <div class="col-4">
    </div>    
  </div>
</div> 


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>





