<?php
// Session 
if (!isset($_SESSION)) {
  session_start();
}
if (empty($_SESSION["auth"])) {
  header("Location: ./pages/login.php");
}

require_once __DIR__ . "/Models/department.php";
require_once __DIR__ . "/helpers/database-conn.php";
require_once __DIR__ . "/helpers/departments-funcion.php";
require_once __DIR__ . "/helpers/login-function.php";


// Start connection with database 
$connection = startConnection();

$username = null;


if (isset($_SESSION["user_id"]) && isset($_SESSION["name"])) {
  // I pick up all departments
  if ($username === null) {
    $username = $_SESSION["username"];
  }
  $departments = getAllDepartments($connection, $username);
}

// Close connection with database 
$connection->close();

?>

<?php include __DIR__ . "/partials/head.php" ?>

<main class="col-md-9 col-lg-10 vh-100 overflow-scroll">
  <div class="">
    <!-- table  -->
    <?php include __DIR__ . "/partials/department-list.php" ?>
  </div>
</main>
<?php include __DIR__ . "/partials/foot.php" ?>