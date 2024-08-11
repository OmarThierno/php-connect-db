<?php

function getAllDepartments($connection)
{
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

  return $departments;
}
