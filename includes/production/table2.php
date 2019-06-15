 

<html>
<head>
	

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

<!-- 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<style>
		
	body{
		background: url(background.jpg);
	}




	</style>


</head>
<body>

	<div class="container"> 
		<div class="row">

			<div class="col-md-10">

				<div class="panel panel-default panel-table">
					<div class="panel-heading">
						<div class="row">
							<div class="col col-xs-4">
								<h3 class="panel-title">Result:</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-list">
						<thead>
							<tr>
								<th>Htno</th>
								<th>subcode</th>
								<th>subname</th>
								<th>grade</th>
								<th>credits</th>
							</tr> 
						</thead>
						<tbody id="myTable">


							<?php
								$server="localhost";
							    $username="root";
							    $password="";
							    $dbname="project";
							    $conn=mysqli_connect($server,$username,$password,$dbname);
							    
							$c=base64_decode($_GET['user_id']);
							$server="localhost";
						    $username="root";
						    $password="";
						    $dbname="project";
						    $conn=mysqli_connect($server,$username,$password,$dbname);
						    
							echo "<h3> $c</h3>";
							$query="SELECT * FROM result where title='".$c."'";
							$sel=mysqli_query($conn,$query);
							while ($fet=mysqli_fetch_array($sel))
							{
								echo "<tr><td>".$fet['Htno']."</td>";
								echo "<td>".$fet['subcode']."</td>";
								echo "<td>".$fet['subname']."</td>";
								echo "<td>".$fet['grade']."</td>";
								echo "<td>".$fet['credits']."</td></tr>";	
							
							}
							?>
						</tbody>
					</table>

				</div>
			</div>

		</div></div></div>
	</body>
	</html>
<script>
		$(document).ready(function() {
			$('.table').DataTable( {
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
				]
			} );
		} );

	</script>

