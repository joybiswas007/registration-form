<?php
require_once 'db/conn.php';

// get values from post operation
if (isset($_POST['submit'])) {
  //extract values from $_POST array
  $id = $_POST['id'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $profession = $_POST['profession'];

  //call CRUD function
  $result = $crud->editDbase($id, $fullname, $email, $password, $phone, $dob, $profession);

  //redirect to index.php
  if ($result) {
    header("Location: viewrecords.php");
  } else {
    include 'includes/errormessage.php';

  }

} else {
  include 'includes/errormessage.php';
}



?>