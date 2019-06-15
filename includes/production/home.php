<title>login form</title>

<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
<style type="text/css"></style>
<div id="content-wrapper">
  <div class="col-md-6 col-md-offset-6 thumbnail" style="margin: auto;border:1px solid #ccc"><br>
    <h3 class="text-center">Result upload form</h3> 
    <form method="post" enctype="multipart/form-data">
        <br><label> college</label>
        <select name="college" class="form-control" required>
            <option value=""> college</option>
            <option value="AEC">Aditya Engineeing College</option>
            <option value="ACET">Aditya college of engineering and technology</option>
            <option value="ACOE">Aditya college of engineering</option>

        </select>


        <br>

        <label> select year</label>
        <select name="year" class="form-control" required>
          <option value=""> year</option>
          <option value="year-1">1</option>
          <option value="year-2">2</option>
          <option value="year-3">3</option>
          <option value="year-4">4</option>
      </select>


      <label> regulation</label>
      <select name="regulation" class="form-control" required>
          <option value="">Regulation</option>
           <?php
            $query = "SELECT * FROM regulations";
            $result = mysqli_query($conn, $query);
            while ($Fetch_Regulation = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $Fetch_Regulation['regulation'] ?>"><?php echo $Fetch_Regulation['regulation'] ?></option>
                <?php
            }
            ?>
      </select>
      <label>type</label>

      <select name="type" class="form-control" required>
        <option value="">Type</option>
        <option value="supplementary">supply</option>
        <option value="regular">regular</option>
    </select>


    <br><label> select semester</label>
    <select name="semester" class="form-control" required>
      <option value=""> sem</option>
      <option value="sem1">Sem 1</option>
      <option value="sem2">Sem 2</option>

  </select>
  <br>
  <input type="file" name="file" id="file" class="form-control">
  <br/>
  <input type="submit"  class="form-control btn btn-primary" name="submit" value="submit">

</form>
</div>
</div>

<?php
if(isset($_POST['submit']))
{
    $t=time();
    $d=date("Y-m-d",$t);
    $y=date("Y",$t);
    $college=mysqli_real_escape_string($conn, $_POST['college']);
    $year=mysqli_real_escape_string($conn, $_POST['year']);
    $regulation=mysqli_real_escape_string($conn, $_POST['regulation']);
    $type=mysqli_real_escape_string($conn, $_POST['type']);
    $semester=mysqli_real_escape_string($conn, $_POST['semester']);  
    $title=$college.'/'.$year.'/'.$semester.'/'.$type.'/'.($regulation).'/'.$y;
    $insert="insert into table1 (`title`,`date`) values ('$title','$d')";
    $ins=mysqli_query($conn,$insert); 
    
     // $insert="insert into result (`title`) values ('$title')";    
     //  $inst=mysqli_query($conn,$insert);  

    $filename=$_FILES["file"]["name"];
   //print_r($filename);


    $move = "uploads/";
    $_FILES["file"]['name']."<br>";
    $_FILES["file"]['tmp_name']."<br>";
    $_FILES["file"]['size']."<br>";
    $_FILES['file']['error']."<br>";

    $ext=substr($filename,strrpos($filename,"."));
    if($ext==".csv")
    {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $move.$filename))
        {
            $sel="SELECT * FROM result WHERE title='".$title."'";
            $se=mysqli_query($conn,$sel);
            $rc=mysqli_num_rows($se);
            if($rc>1)
            {
                echo "already exist";
                echo "<script>alert('go to view page');</script>";

            }
            else
            {
                $i=1;
                $file = fopen($move.$_FILES["file"]['name'], "r");
                while (($studata = fgetcsv($file, ",")) !== FALSE){
               //echo $studata[0];
               //echo $studata[1];
               //echo $studata[2]; 
               //echo $studata[3];
               //echo $studata[4];
               //echo "<br/>";

                    if($studata[0]=='Htno' or $studata[0]=="")
                    {
                        continue;
                    }
                    $sql="insert into result(Htno,subcode,subname,grade,credits,title)
                    values('$studata[0]','$studata[1]','$studata[2]','$studata[3]','$studata[4]','$title')";
                    $in= mysqli_query($conn,$sql);
                    if($in==1)
                    {
                    //echo $i;

                        $i++;
                    }
                    else
                    {
                        echo $i;
                        $i++;
                    }
                }  


            }
        }
    }
    else
    {
        echo "Error: Please Upload only CSV File";
    }
        //unlink('uploads/'.$filename);
}



?>
