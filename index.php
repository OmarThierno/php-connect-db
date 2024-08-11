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

if($result && $result->num_rows > 0) {
  $row = $result->fetch_object();
  // var_dump($row);

  while($row) {
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

var_dump($departments);