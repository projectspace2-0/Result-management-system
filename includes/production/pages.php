<?php

$p=$_GET['p'];

	switch ($p) {
		case 'home':include("production/home.php");
			break;
		case 'regulation':include("production/regulation.php");	
		    break;
		case 'viewpage':include("production/viewpage.php");	
		    break;
		case 'delete':include("production/delete.php");	
		    break;
		case 'table2':include("production/table2.php");	
		    break;
		case 'password':include("production/password.php");	
		    break;
		case 'sample':include("production/sample.php");	
		    break;    
		default:
		include("production/home.php");
			# code...
			break;
	}

?>