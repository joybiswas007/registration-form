<?php
$title = 'Browse Index';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $profession = $_POST['profession'];
  $isSuccess = $crud->insertDbase($fullname, $email, $password, $phone, $dob, $profession);

  if ($isSuccess) {
    include 'includes/successmessage.php';
  } else {
    include 'includes/errormessage.php';
  }

}
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
      Name: <?php echo $_POST['fullname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
      Profession Name: <?php echo $_POST['profession']; ?>
    </h6>
    <p class="card-text">
      Email address: <?php echo $_POST['email']; ?>
    </p>
    <p class="card-text">
      Password: <?php echo $_POST['password']; ?>
    </p>
    <p class="card-text">
      Date of Birth: <?php echo $_POST['dob']; ?>
    </p>
    <p class="card-text">
      Phone: <?php echo $_POST['phone']; ?>
    </p>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>