<?php
session_start();
session_destroy();
echo "<script>alert('logedout');location.href='../index.php'</script>";
?>