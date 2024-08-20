<?php
if (!isset($_SESSION)) {
  session_start();

  $username = $_SESSION["username"];
}

// var_dump($username)
$isStudentsShow = true;

?>

<?php if ($_SESSION["auth"]) { ?>
  <?php
  require_once(__DIR__ . '/../helpers/students-function.php');
  require_once(__DIR__ . '/../helpers/database-conn.php');
  require_once(__DIR__ . '/../Models/student.php');

  $search = null;

  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }

  $connection = startConnection();

  $students = getStudents($connection, $username, $search);

  // var_dump($students);
  $connection->close();

  ?>

  <?php include __DIR__ . "/../partials/head.php" ?>

  <!-- Main -->
  <main class="col-md-9 col-lg-10 vh-100 overflow-scroll">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Students</h1>
      <form class="d-flex gap-2" action="students.php" method="GET">
        <input type="text" class="form-control" name="search" id="search" placeholder="filter by name">
        <button type="submit" class="btn btn-primary">apply</button>
      </form>
    </div>
    <div>
      <?php if (count($students) > 0) { ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $student) { ?>
              <tr>
                <th scope="row"><?= $student->getName() ?></th>
                <td><?= $student->getSurname() ?></td>
                <td><?= $student->getEmail() ?></td>
                <td>
                  <a href="show.php?student=<?= $student->getId() ?>" class="btn btn-success">Show Details</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else { ?>
        <h3>No results found!</h3>
      <?php } ?>
    </div>
  </main>
  <!-- /Main -->
  <?php include __DIR__ . "/../partials/foot.php" ?>
  

<?php } else {
  header(("Location: ../index.php"));
} ?>