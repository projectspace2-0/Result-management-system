

<div id="content-wrapper">
  <div class="col-md-6 col-md-offset-6 thumbnail" style="margin: auto;border:1px solid #ccc"><br>
 
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="Password">New Password</label>
    <input type="text" class="form-control" name="password" value="" required>
  </div>
  <button type="submit" name="submit" class="form-control btn btn-primary">Submit</button>



</form>

</div>
</div>


<?php

if(isset($_POST['submit']))
{
     $pwd=mysqli_real_escape_string($conn, $_POST['password']);
$up="UPDATE admin set password='".$pwd."' where username='".$_SESSION['username']."'";
$u=mysqli_query($conn,$up);


}

?>