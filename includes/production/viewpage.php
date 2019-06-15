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
	<!-- <script>
		$(document).ready(function() {
			$('.table').DataTable( {
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
				]
			} );
		} );

	</script>

 -->


</head>
<body>

	<div class="container"> 
		<div class="row">

			<div class="col-md-10">

				<div class="panel panel-default panel-table">
					<div class="panel-heading">
						<div class="row">
							<div class="col col-xs-4">
								<h3 class="panel-title">details table</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-list">
						<thead>
							<tr>
								<th>s.no</th>
								<th>titles</th>
								<th>date</th>
								<th>view</th>
								<th>delete</th>
							</tr> 
						</thead>
						<tbody id="myTable">


							<?php
							$c=1;
							$query="SELECT * FROM table1";
							$sel=mysqli_query($conn,$query);
							while ($fet=mysqli_fetch_array($sel)){
								
								echo "<tr><td>".$c++."</td>";
								echo "<td>".$fet['title']."</td>";
								echo "<td>".$fet['date']."</td>";
								echo "<td><a href='?p=table2&&user_id=".base64_encode($fet['title'])."'><button type='submit' class='form-control btn btn-primary' name='view' value='".$fet['title']."'> view</button></a></td>";
								echo "<td><a href='?p=delete&&user_id=".base64_encode($fet['title'])."'><button type='submit' class='form-control btn btn-danger' name='delete' value='".$fet['title']."'> delete</button></a> </td>";
								
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

