<?php
$title = 'View Records';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
//get all from database
$results = $crud->getDbase();
?>
<table class="table table-success table-striped">
	<tr>
		<th>#</th>
		<th>Fullname</th>
		<th>Email address</th>
		<th>Profession</th>
		<th>Actions</th>
	</tr>
	<?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td><?php echo $r['dbase_id'] ?></td>
			<td>
				<?php echo $r['fullname'] ?>
			</td>
			<td><?php echo $r['email'] ?></td>
			<td>
				<?php echo $r['name'] ?>
			</td>
			<td><a href="view.php?id=<?php echo $r['dbase_id'] ?>" class="btn btn-primary">View</a>
				<a href="edit.php?id=<?php echo $r['dbase_id'] ?>" class="btn btn-warning">Edit</a>
				<a onclick="return confirm('Are you sure you want to delete this record?');"
					href="delete.php?id=<?php echo $r['dbase_id'] ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<?php require_once 'includes/footer.php'; ?>
