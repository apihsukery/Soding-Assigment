<?php
  
include('db.php');

$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];

$edit = mysql_query("UPDATE task SET name='$name',description='$desc' WHERE id='$id'");       

if($edit)
{
	echo "<script language='JavaScript'>alert('Edit Successful');</script>";
	echo "<script>window.location='index.php'</script>";

}


?>

