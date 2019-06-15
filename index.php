<?php
include("includes/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Login</title>
  <!-- Custom fonts for this template-->
  <link href="includes/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="includes/css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
<form action="" method="POST" class="form-signin">
  <h2 class="form-signin-heading text-center">Login Form</h2>
  <LABEL> Username:</LABEL>
  <input type="text" class="form-control" value="" name="username" placeholder="username" required autofocus="" />
  <label>Password:</label>
  <input type="password" class="form-control" name="password" placeholder="Password" value="" required />
          </div>
          <input type="submit" class="btn btn-primary btn-block" name="submit">
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="includes/vendor/jquery/jquery.min.js"></script>
  <script src="includes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="includes/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $select="select * from admin where username='$user' and password='$pass' ";
    $res=mysqli_query($conn,$select);
    $rc=mysqli_num_rows($res);
    $fe=mysqli_fetch_array($res);
    if($rc==1)
    {
    	$fetch_details=($fe);
    	if($fetch_details['username']==$user and $fetch_details['password']==$pass)
    	{
    		$_SESSION['username']=$user;
    		echo "<script>alert('login succesfull');</script>";
        echo "<script>location.href='includes/index.php?p=home'</script>";
    	}
    	else
    	{
    		echo "<script>alert('invalid username');</script>";
        echo "<script>location.href='index.php'</script>";
    	}
    }
    else
    {
    	echo "<script>alert('invalid username');</script>";
      echo "<script>location.href='index.php'</script>";
    }
}
?>