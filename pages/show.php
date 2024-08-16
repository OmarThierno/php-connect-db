<?php
if (!isset($_SESSION)) {
  session_start();

  $username = $_SESSION["username"];
  $id = $_GET["student"];
}

?>

<?php if ($_SESSION["auth"]) { ?>

  <?php
  require_once __DIR__ . "/../helpers/database-conn.php";
  require_once __DIR__ . "/../helpers/student-detail-function.php";
  require_once __DIR__ . "/../Models/student-detail.php";

  $connection = startConnection();

  $student = getStudentDetail($connection, $username, $id);

  if($student) {
    $student["average_vote"] = floatval($student["average_vote"]);
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>

    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonta-wesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

  <body>
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

    <div class="container-fluid">
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
              <a href="../index.php" class="nav-link text-white" aria-current="page">
                <i class="fa-solid fa-house"></i>
                Dashboard
              </a>
            </li>
            <li class="mb-3">
              <a href="students.php" class="nav-link active">
                <i class="fa-solid fa-user"></i>
                Students
              </a>
            </li>
            <li>
              <form action="logout.php" method="POST">
                <input type="hidden" name="logout" id="" value="out">
                <button class="btn btn-secondary" type="submit">Logout</button>
              </form>
            </li>
          </ul>
        </div>

        <!-- Main -->
        <main class="col-md-9 col-lg-10 vh-100 overflow-scroll">
          <?php if ($student) { ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2"><?= $student["name"] . ' ' . $student["surname"] ?></h1>
              <div><?= $student["registration_number"] ?></div>
            </div>
            <div>
              <dl>
                <dt>date of birth:</dt>
                <dd><?= $student["date_of_birth"] ?></dd>
                <dt>fiscal code:</dt>
                <dd><?= $student["fiscal_code"] ?></dd>
                <dt>email:</dt>
                <dd><?= $student["email"] ?></dd>
                <dt>level:</dt>
                <dd><?= $student["level"] ?></dd>
              </dl>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">How many times</th>
                    <th scope="col">Average vote</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $student["how_many_times"] ?></td>
                    <th scope="row"><?= $student["average_vote"] ?></th>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <h1>NON PRESENTI</h1>
          <?php } ?>
        </main>
        <!-- /Main -->
      </div>
    </div>

    <!-- Bootstrap script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap script  -->
  </body>

  </html>

<?php } else {
  header(("Location: ../index.php"));
} ?>