<?php
if (!isset($_SESSION)) {
  session_start();

  $username = $_SESSION["username"];
  $id = $_GET["student"];
}

$isStudentsShow = true;
?>

<?php if ($_SESSION["auth"]) { ?>

  <?php
  require_once __DIR__ . "/../helpers/database-conn.php";
  require_once __DIR__ . "/../helpers/student-detail-function.php";
  require_once __DIR__ . "/../Models/student-detail.php";

  $connection = startConnection();

  $student = getStudentDetail($connection, $username, $id);

  if ($student) {
    $student["average_vote"] = floatval($student["average_vote"]);
  }

  $connection->close();
  ?>

  <?php include __DIR__ . "/../partials/head.php" ?>


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
  <?php include __DIR__ . "/../partials/foot.php" ?>


<?php } else {
  header(("Location: ../index.php"));
} ?>