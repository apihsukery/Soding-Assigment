<?php

include('db.php');

$id = $_GET['id'];

$delete = mysql_query("DELETE FROM task WHERE id='$id'" );


echo "<script language='JavaScript'>alert('Delete Successful');</script>";
echo "<script>window.location='index.php'</script>";
		
?>