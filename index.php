<?php
require_once __DIR__ . "/Models/department.php";

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "universal_db_small");
define("DB_PORT", 8889);


try {
  $connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
} catch (Exception $e) {
  echo $e->getMessage();
  die();
}

// var_dump($connection);

$sql = "SELECT * FROM `departments`;";

$result = $connection->query($sql);

$departments = [];

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_object();
  // var_dump($row);

  while ($row) {
    $newDepartment = new Department($row->id, $row->name);
    $newDepartment->setAddress($row->address);
    $newDepartment->setPhone($row->phone);
    $newDepartment->setEmail($row->email);
    $newDepartment->setWebsite($row->website);
    $newDepartment->setHeadOfDepartment($row->head_of_department);
    // var_dump($newDepartment);

    $departments[] = $newDepartment;

    $row = $result->fetch_object();
  }
}

// var_dump($departments);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <!-- NavBar  -->
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- /NavBar  -->

  <div class="container">
    <h2>Lista di Dipartimenti</h2>
    <?php if (count($departments) > 0) { ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">address</th>
            <!-- <th scope="col">phone</th>
            <th scope="col">email</th>
            <th scope="col">website</th> -->
            <th scope="col">head of department</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($departments as $department) { ?>
          <tr>
            <th scope="row"><?php echo $department->getName() ?></th>
            <td><?= $department->getAddress() ?></td>
            <!-- <td><?= $department->getPhone() ?></td>
            <td><?= $department->getEmail() ?></td>
            <td><?= $department->getWebsite() ?></td> -->
            <td><?= $department->getHeadOfDepartment() ?></td>
            <td></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <h3>Non ci sono risultati</h3>
    <?php } ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>