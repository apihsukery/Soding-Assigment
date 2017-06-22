<?php

include('db.php');

$name = $_POST['name'];
$description = $_POST['desc'];


$add = mysql_query("INSERT INTO task(name,description) VALUES
('$name','$description')" );

if($add)
{
	echo "<script language='JavaScript'>alert('New Task Has Been Added');</script>";
}
else{
	echo "<script language='JavaScript'>alert('Error occur. Please try again.');</script>";
}

echo "<script>window.location='index.php'</script>";

?>