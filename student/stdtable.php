<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


</head>
<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Merriweather&display=swap');


a{
    color: #f00;
    text-decoration: none !important;
    transition: 0.5s
}
a:hover{
    color: #0f0;
}
.container{
    width:100%;
    height:100%;
    background-size:cover;
    background-image:url("final/images/bg.jpg");
}
</style>
<body>
  

   
   <div class="container"> 
    <h2 text align="right" style="font-family: 'Merriweather', serif;">EXAMINATION INFORMATION CENTER</h2>

<h2 text align="right" style="font-family: 'Merriweather', serif;
">(adityaresults.in)</h2>
<h2 text align="left" style="font-family: 'Merriweather', serif;">Published Results</h2>
    

    


    <div class="row">


        <div class="col-md-10" style="background: #45454455;margin-left: 100px;margin-top: 20px">


            <div class="panel-body table-responsive">

                <table class="table table-striped  table-list">
                    <thead >
                        <tr>
                            <th>Current Results</th>
                            <th>Published Date</th>
                        </tr> 
                    </thead>
                    <tbody id="myTable">


                        <?php

                        $server="localhost";
                        $username="root";
                        $password="";
                        $dbname="project";
                        $conn=mysqli_connect($server,$username,$password,$dbname);
                        $query="SELECT * FROM table1";
                        $sel=mysqli_query($conn,$query);
                        while ($fet=mysqli_fetch_array($sel))
                        {   
                            ?>
                            <tr>
                            <td>
                            <a href='final/index2.php?id=<?php echo base64_encode($fet['title'])?>'> <?php echo $fet['title']?></a></td>
                            <td>
                                <?php echo $fet['date']?>
                           </td> </tr>
                        <?php
                        }
                        ?> 
                    </tbody>
                </table>

            </div>
        </div>

    </div></div></div>
</body>
</html>

