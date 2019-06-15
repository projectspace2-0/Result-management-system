
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

	<title>Minimum Bootstrap HTML Skeleton</title>

	<!--  -->

	<style>
     

        .container{
            margin-top: 100px;
        }
        body{
            background-color: grey;
        }

	</style>

</head>

<body>
  
	<div class="container">

	
	<table class="table table-bordered" id="1">
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
             $server="localhost";
                $username="root";
                $password="";
                $dbname="project";
                $conn=mysqli_connect($server,$username,$password,$dbname);

                $query="SELECT * FROM result where Htno='".$_SESSION['hall']."' and title='".$_SESSION['tit']."'  ";
              $sel=mysqli_query($conn,$query);
              while ($fet=mysqli_fetch_array($sel))
              {
                echo "<tr><td>".$fet['Htno']."</td>";
                echo "<td>".$fet['subcode']."</td>";
                echo "<td>".$fet['subname']."</td>";
                if ($fet['grade']=='F' || $fet['grade']=='ABSENT') {
                  echo "<td class='text-danger'>".$fet['grade']."</td>";
                }
                else {
                  echo "<td>".$fet['grade']."</td>";
                }
                echo "<td>".$fet['credits']."</td></tr>"; 
              
              }



                ?>
      
  </tbody>
</table>
     
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
