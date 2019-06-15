          <?php
$c=base64_decode($_GET['id']);
$c;
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <title>HALLtickets page </title>

  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/coming-sssoon.css" rel="stylesheet" />    

  <!--     Fonts     -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  <style >
  body{
    /*background:url("default.JPG") no-repeat center center fixed;*/
    color: #000;
    background:#fff  ;
  }
  .form-group{
    border:2px solid black;
  }
  .info1{
    border:2px solid black;
  }
  .info{
    border:2px solid black;
  }
  .subscribe{
    border:2px solid black; 
  }


</style>
</head>
<body>      
  <div class="main">
    <div class="container">
      <div class="content">
        <div class="subscribe">
          <h3 class="info-text" style="color: #273746  ">
            Description :<?php echo $c;   ?>
          </h3>
          <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm6-6 col-sm-offset-3 ">
              <form method="POST" class="form-inline" role="form">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail2"></label>
                  <input type="text"  name="hallticket" value="<?php echo @$_POST['hallticket'] ?>" class="form-control style:"color:#273746 " placeholder=" enter hall ticket here... ">
                </div>
                <input type="submit" name="submit" class="form-control btn btn-primary" value="submit"> 
              <!--  <button type="submit" class="form-control btn btn-primary" name="submit">submit</button> -->

              </form>

            </div>
          </div>
        </div>
      </div>


      <?php
      $server="localhost";
      $username="root";
      $password="";
      $dbname="project";
      $conn=mysqli_connect($server,$username,$password,$dbname);
      if(isset($_POST['submit'])){
        ?>

        <div class="col-md-8 col-sm-offset-2"><br><br>
          <table class="table table-bordered info1" id="1">
            <thead >
              <tr class="info">
                <th scope="col">Regdno</th>
                <th scope="col">subcode</th>
                <th scope="col">Subname</th>
                <th scope="col">Grade</th>
                <th scope="col">Credits</th>    
              </tr>
            </thead>
            <tbody>
              <?php
              $hall=mysqli_real_escape_string($conn,$_POST['hallticket']);
              $query="SELECT * FROM result where  Htno='".$hall."'and title='".$c."'";
              $sel=mysqli_query($conn,$query);
              while ($fet=mysqli_fetch_array($sel)){
                if ($fet['grade']=='F' || $fet['grade']=='ABSENT') {
                  echo "<tr style='background:#e60000'><td>".$fet['Htno']."</td>";
                  echo "<td>".$fet['subcode']."</td>";
                  echo "<td>".$fet['subname']."</td>";

                  echo "<td >".$fet['grade']."</td>";
                  echo "<td>".$fet['credits']."</td></tr>"; 
                }
                else {
                   echo "<tr><td>".$fet['Htno']."</td>";
                  echo "<td>".$fet['subcode']."</td>";
                  echo "<td>".$fet['subname']."</td>";
                  
                  echo "<td>".$fet['grade']."</td>";
                  echo "<td>".$fet['credits']."</td></tr>"; 
                  
                }


              }
              ?>

            </tbody>
          </table>

        </div>
      <?php } ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </div>

  </div>
</body>
<!--  <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
-->
</html>
