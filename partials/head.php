<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UniPD</title>

  <!-- Bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Fonta-wesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<?php if (!empty($_SESSION["user_id"]) && !empty($_SESSION["name"])) { ?>
  <!-- Header  -->
  <header class="d-md-none">
    <nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
      <!-- Container -->
      <div class="container">
        <!-- brand -->
        <a class="navbar-brand text-uppercase" href="#">UniPD</a>
        <!-- /brand -->

        <!-- Hamburger button -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
        <!-- /Hamburger button -->
      </div>
      <!-- /Container -->
    </nav>
  </header>
  <!-- /Header  -->
  <?php } else { ?>
    <header class="">
    <nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
      <!-- Container -->
      <div class="container">
        <!-- brand -->
        <a class="navbar-brand text-uppercase" href="#">UniPD</a>
        <!-- /brand -->
      <!-- /Container -->
    </nav>
  </header>
  <?php } ?>

  <div class="container-fluid">
    <?php if (!empty($_SESSION["user_id"]) && !empty($_SESSION["name"])) { ?>
    <div class="row">
      <!-- Sidebar -->
      <div
        class="sidebar col-md-3 col-lg-2 collapse d-md-block bg-dark pb-3"
        id="navbarSupportedContent">
        <div class="d-none d-md-flex text-white justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h5">UniPD</h1>
        </div>


        <ul class="nav nav-pills flex-column pt-4 mb-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link active" aria-current="page">
              <i class="fa-solid fa-house"></i>
              Dashboard
            </a>
          </li>
          <li class="mb-3">
            <a href="./pages/students.php" class="nav-link text-white">
              <i class="fa-solid fa-user"></i>
              Students
            </a>
          </li>
          <li>
            <form action="./pages/logout.php" method="POST">
              <input type="hidden" name="logout" id="" value="out">
              <button class="btn btn-secondary" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
  <?php } ?>
