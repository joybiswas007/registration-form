<?php
$title = 'Browse Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getProfession();
?>

<h1 class="text-center"> Registration Form </h1>

<form method="post" action="success.php">
	<div class="form-group">
		<label for="fullname" class="form-label">Fullname</label>
		<input type="fullname" id="fullname" name="fullname" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="email1" class="form-label">Email address</label>
		<input type="email" class="form-control" id="email" name="email" required>
		<div id="emailHelp" class="form-text"> N.B. Disposable email addresses are not allowed!</div>
	</div>
	<div class="form-group">
		<label for="password" class="form-label">Password</label>
		<input type="password" id="password" name="password" class="form-control" required>
		<div id="passwordHelpBlock" class="form-text">A strong password is 8 characters or longer, contains at least 1
			lowercase and uppercase letter, and contains at least a number or a symbol, or is 20 characters or longer.
		</div>
		<div class="form-group">
			<label for="phone" class="form-label">Phone Number</label>
			<input type="phone" id="phone" name="phone" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="dob" class="form-label">Date of Birth</label>
			<input type="text" id="dob" name="dob" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="profession">Select Your Desired Profession</label>
			<select class="form-control" id="profession" name="profession">
				<?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $r['profession_id'] ?>">
						<?php echo $r['name']; ?>
					</option>
				<?php } ?>
			</select>
		</div>
		<button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
</form>

<?php require_once 'includes/footer.php'; ?>