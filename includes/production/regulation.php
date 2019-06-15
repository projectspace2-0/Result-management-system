

<div class="container">
	

	<form class="form-inline" method="post">
		<div class="form-group has-success has-feedback">
			<label class="control-label" >Add Regulation:</label>
			<input type="text" name="reg" class="form-control" value="" required >
			<br>
			<input type="submit"  class="form-control btn btn-primary" name="submit" value="submit">

			<!--    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
			<!--    <span id="inputSuccess4Status" class="sr-only">(success)</span>-->
		</div>
	</form>
</div>
<?php

if(isset($_POST['submit']))
{
    $re=mysqli_real_escape_string($conn, $_POST['reg']);
    $select="select * from regulations where regulation='".$re."'";
    $inse=mysqli_query($conn,$select);
	$in=mysqli_num_rows($inse);
	if($in==1)
	{
		echo "<script>alert('already exist');</script>";
	}  
	else
	{
		 //$re=mysqli_real_escape_string($conn, $_POST['reg']);
    $insert="insert into regulations (`regulation`) values ('$re')";
    $ins=mysqli_query($conn,$insert);

	}
}
?>