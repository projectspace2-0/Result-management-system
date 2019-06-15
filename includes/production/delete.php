
							<?php

							$c=base64_decode($_GET['user_id']);
							$server="localhost";
						    $username="root";
						    $password="";
						    $dbname="project";
						    $conn=mysqli_connect($server,$username,$password,$dbname);
							//echo $c;
							$de="DELETE FROM `table1` WHERE title='".$c."'";
							$del=mysqli_query($conn,$de);
							$d="DELETE FROM `result` WHERE title='".$c."'";
							$s=mysqli_query($conn,$d);
							echo "<script>alert('deleted sucessfully');</script>";
      						echo "<script>location.href='?p=viewpage'</script>";
							?>