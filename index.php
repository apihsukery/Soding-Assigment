<?php
	include('db.php');
	$result = mysql_query("SELECT * FROM task");
?>

<html>
<head>
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>

	<!-- LIST -->
	<h2>List of Task</h2>
	<table border="1">
		<tr>
			<th>#</th>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Date Created</th>
			<th>Date Updated</th>
			<th>Action</th>
		</tr>
		<?php
			$count=0;
			while ($rec = mysql_fetch_assoc($result)) 
			{ 
				$count++;
				?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $rec['id'];?></td>
					<td><?php echo $rec['name'];?></td>
					<td><?php echo $rec['description'];?></td>
					<td><?php echo date("d-m-Y", strtotime($rec['dateCreated']));?></td>
					<td><?php echo date("d-m-Y", strtotime($rec['dateUpdated']));?></td>
					<td><button type="button" class="edit" name="edit" data-id="<?php echo $rec['id'] ?>" data-name="<?php echo $rec['name'] ?>" data-desc="<?php echo $rec['description'] ?>">Edit</button> <button class="delete" name="delete" data-id="<?php echo $rec['id'] ?>">Delete</button></td>
				</tr>
			<?php 
			}
		?>
	</table>

	<!-- EDIT -->
	<div id="editdiv" style="display: none;">
		<br>
		<h2 id="head_title"></h2>
		<form method="post" action="edit.php">
		<input type="text" name="id" id="idval">
		<table>
			<tr>
				<td valign="top">Name</td>
				<td valign="top">:</td>
				<td><input type="text" name="name" id="nameval" maxlength="50" value=""></td>
			</tr>
			<tr>
				<td valign="top">Description</td>
				<td valign="top">:</td>
				<td><textarea name="desc" id="descval" rows="10" cols="30"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Edit"></td>
			</tr>
		</table>
	</form>
	</div>

	<!-- ADD -->
	<br>
	<h2>Add New Task</h2>
	<form method="post" action="add.php">
		<table>
			<tr>
				<td valign="top">Name</td>
				<td valign="top">:</td>
				<td><input type="text" name="name" maxlength="50"></td>
			</tr>
			<tr>
				<td valign="top">Description</td>
				<td valign="top">:</td>
				<td><textarea name="desc" rows="10" cols="30"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="add" value="Add"></td>
			</tr>
		</table>
	</form>

	<script type="text/javascript">

		$(".edit").click(function(){
			var id = $(this).attr("data-id");
			var name = $(this).attr("data-name");
			var desc = $(this).attr("data-desc");

			$("#idval").val(id);
			$("#nameval").val(name);
			$("#descval").val(desc);
			$("#head_title").text('Edit Task ID='+id);

		    $("#editdiv").show();
		});

		$(".delete").click(function(){
			var id = $(this).attr("data-id");
		    window.location.href = "delete.php?id="+id;
		});

	</script>

</body>
</html>