<?php
 $server="localhost";
    $username="root";
    $password="";
    $dbname="project";
    $conn=mysqli_connect($server,$username,$password,$dbname);
  if($conn)
  {
  	echo "successfull";

  }
  else
  {
  	echo "not successfull";
  }
?>