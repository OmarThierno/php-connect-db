<?php
require_once __DIR__ . "/Models/department.php";
require_once __DIR__ . "/helpers/database-conn.php";
require_once __DIR__ . "/helpers/departments-funcion.php";

// Session 
if (!isset($_SESSION)) {
  session_start();
}

// Start connection with database 
$connection = startConnection();

// check your login
if (isset($_POST["username"]) && isset($_POST["password"])) {
  $usename = $_POST["username"];
  $password = $_POST["password"];

  $hashedPassword = md5($password);

  // risk of SQL injection
  // $sql = "SELECT * FROM `users` WHERE `username` = '$usename' AND `password` = '$hashedPassword';";
  // $result = $connection->query($sql);

  // protected by injection
  $statement = $connection->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? ;");
  $statement->bind_param("ss", $usename, $hashedPassword);
  $statement->execute();
  $result = $statement->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["ID"];
    $usename = $row["username"];

    $_SESSION["user_id"] = $id;
    $_SESSION["username"] = $usename;
  }
}

if (isset($_SESSION["user_id"]) && isset($_SESSION["username"])) {
  // I pick up all departments
  $departments = getAllDepartments($connection);
}

// Close connection with database 
$connection->close();

?>

<?php include __DIR__ . "/partials/head.php" ?>

<?php if (empty($_SESSION["user_id"]) && empty($_SESSION["username"])) { ?>
  <main class="">
<?php } else { ?>
    <main class="col-md-9 col-lg-10 vh-100 overflow-scroll">
<?php } ?>

    <div class="">
      <?php if (empty($_SESSION["user_id"]) && empty($_SESSION["username"])) { ?>
        <?php if (isset($_GET["logout"])  && $_GET["logout"] === 'success') { ?>
          <div class="alert alert-success text-center mt-4">Logout success</div>
        <?php } ?>
        <!-- login  -->
        <?php include __DIR__ . "/partials/login.php" ?>
      <?php } else { ?>
        <!-- table  -->
        <?php include __DIR__ . "/partials/department-list.php" ?>
      <?php } ?>
    </div>
    </main>

    <?php include __DIR__ . "/partials/foot.php" ?>