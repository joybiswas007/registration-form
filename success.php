<?php
$title = 'Browse Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendemail.php';

if (isset($_POST['submit'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $profession = $_POST['profession'];

  $orig_file = $_FILES['avatar']['tmp_name'];
  $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
  $target_dir = "uploads/";
  $avatar_path = "$target_dir$phone.$ext";
  move_uploaded_file($orig_file,$avatar_path);

  $isSuccess = $crud->insertDbase($fullname, $email, $password, $phone, $dob, $profession, $avatar_path);
  $professionName = $crud->getProfessionID($profession);


  if ($isSuccess) {
    SendEmail::SendMail($email, 'Welcome to the party.', 'Registration has been successfull.');
    include 'includes/successmessage.php';

  } else {
    include 'includes/errormessage.php';
  }

}
?>
<img src="<?php echo $avatar_path; ?>" style="width: 20%; height: 20%;" />
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
      Name: <?php echo $_POST['fullname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
      Profession Name: <?php echo $professionName['name']; ?>
    </h6>
    <p class="card-text">
      Email address: <?php echo $_POST['email']; ?>
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