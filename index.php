<?php
require_once __DIR__ . "/Models/department.php";
require_once __DIR__ . "/helpers/database-conn.php";
require_once __DIR__ . "/helpers/departments-funcion.php";

// Start connection with database 
$connection = startConnection();

// check your login
if(isset($_POST["username"]) && isset($_POST["password"])) {
  $usename = $_POST["username"];
  $password = $_POST["password"];

  $hashedPassword = md5($password);

  // risk of SQL injection
  // $sql = "SELECT * FROM `users` WHERE `username` = '$usename' AND `password` = '$hashedPassword';";
  // $result = $connection->query($sql);

  $statement = $connection->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? ;");
  $statement->bind_param("ss", $usename, $hashedPassword);
  $statement->execute();
  $result = $statement->get_result();
  
  var_dump($result);
}

// I pick up all departments
$departments = getAllDepartments($connection);

// Close connection with database 
$connection->close();

?>

<?php include __DIR__ . "/partials/head.php" ?>

<main>
  <div class="container">
    <!-- login  -->
  <?php include __DIR__ . "/partials/login.php" ?>

    <!-- table  -->
    <?php include __DIR__ . "/partials/department-list.php" ?>
  </div>
</main>

<?php include __DIR__ . "/partials/foot.php" ?>