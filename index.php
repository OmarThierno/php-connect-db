<?php
require_once __DIR__ . "/Models/department.php";
require_once __DIR__ . "/helpers/database-conn.php";
require_once __DIR__ . "/helpers/departments-funcion.php";

// Start connection with database 
$connection = startConnection();

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