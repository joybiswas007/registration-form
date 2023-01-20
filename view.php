<?php
$title = 'View Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

if (!isset($_GET['id'])) {
  include 'includes/errormessage.php';
} else {
  $id = $_GET['id'];
  $result = $crud->getDetails($id);
  ?>

  <img src="<?php echo empty($result['avatar_path']) ? "uploads/default.png" : $result['avatar_path']; ?>" style="width: 20%; height: 20%;" />
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">
        Name: <?php echo $result['fullname']; ?>
      </h5>
      <h6 class="card-subtitle mb-2 text-muted">
        Profession Name: <?php echo $result['name']; ?>
      </h6>
      <p class="card-text">
        Email address: <?php echo $result['email']; ?>
      </p>
      <p class="card-text">
        Date of Birth: <?php echo $result['dob']; ?>
      </p>
      <p class="card-text">
        Phone: <?php echo $result['phone']; ?>
      </p>
    </div>
  </div>
  <br />
  <a href="viewrecords.php" class="btn btn-info">Back to List</a>
  <a href="edit.php?id=<?php echo $result['dbase_id'] ?>" class="btn btn-warning">Edit</a>
  <a onclick="return confirm('Are you sure you want to delete this record?');"
    href="delete.php?id=<?php echo $result['dbase_id'] ?>" class="btn btn-danger">Delete</a>

<?php } ?>
<?php require_once 'includes/footer.php'; ?>