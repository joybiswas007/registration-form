<?php include_once 'includes/session.php'; ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Application - <?php echo $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Application</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="Home" href="index.php">Home</a>
          <a class="nav-link" href="viewrecords.php">View Records</a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <?php
            if (!isset($_SESSION['id'])) {
              ?>
              <a class="nav-link active" aria-current="Dashboard" href="login.php">Login</a>
            <?php } else { ?>
              <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
              <a class="nav-link active" aria-current="Home" href="logout.php">Logout</a>
            <?php } ?>
          </div>
        </div>
      </div>
  </nav>
  <div class="container">