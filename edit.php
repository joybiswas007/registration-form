<?php
$title = 'Edit Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
$results = $crud->getProfession();

if (!isset($_GET['id'])) {
	include 'includes/errormessage.php';
	header("Location: viewrecords.php");
} else {
	$id = $_GET['id'];
	$dase = $crud->getDetails($id);
	?>

	<h1 class="text-center"> Edit Record </h1>

	<form method="post" action="editpost.php">
		<div class="mb-3">
			<input type="hidden" name="id" value="<?php echo $dase['dbase_id'] ?>" />
			<label for="fullname" class="form-label">Fullname</label>
			<input type="fullname" value="<?php echo $dase['fullname'] ?>" id="fullname" name="fullname"
				class="form-control">
		</div>
		<div class="mb-3">
			<label for="email1" class="form-label">Email address</label>
			<input type="email" class="form-control" value="<?php echo $dase['email'] ?>" id="email" name="email">
			<div id="emailHelp" class="form-text"> N.B. Disposable email addresses are not allowed!</div>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" value="<?php echo $dase['password'] ?>" id="password" name="password"
				class="form-control">
			<div id="passwordHelpBlock" class="form-text">A strong password is 8 characters or longer, contains at least 1
				lowercase and uppercase letter, and contains at least a number or a symbol, or is 20 characters or longer.
			</div>
			<div class="mb-3">
				<label for="phone" class="form-label">Phone Number</label>
				<input type="phone" value="<?php echo $dase['phone'] ?>" id="phone" name="phone" class="form-control">
			</div>
			<div class="mb-3">
				<label for="dob" class="form-label">Date of Birth</label>
				<input type="text" value="<?php echo $dase['dob'] ?>" id="dob" name="dob" class="form-control">
			</div>
			<div class="mb-3">
				<label for="profession">Select Your Desired Profession</label>
				<select class="form-control" id="profession" name="profession">
					<?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $r['profession_id'] ?>" <?php if ($r['profession_id'] == $dase['profession_id'])
							   echo 'selected' ?>>
							<?php echo $r['name']; ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<button type="submit" id="submit" name="submit" class="btn btn-success btn-lg">Save Changes</button>
	</form>
	<br />
	<a href="viewrecords.php" class="btn btn-info">Back to List</a>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>