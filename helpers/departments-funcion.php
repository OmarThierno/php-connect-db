<?php

function getAllDepartments($connection, $username)
{
  // $sql = "SELECT * FROM `departments`;";

  // $result = $connection->query($sql);

  $statement = $connection->prepare("SELECT DISTINCT `departments`.`id`, `departments`.`name`, `departments`.`address`, `departments`.`address`, `departments`.`phone`, `departments`.`email`, `departments`.`website`, `departments`.`head_of_department`
    FROM `departments`
    INNER JOIN `degrees`
    ON `departments`.`id` = `degrees`.`department_id`
    INNER JOIN `courses`
    ON `degrees`.`id` = `courses`.`degree_id`
    INNER JOIN `course_teacher`
    ON `courses`.`id` = `course_teacher`.`course_id`
    INNER JOIN `teachers`
    ON `course_teacher`.`teacher_id` = `teachers`.`id`
    WHERE `teachers`.`email` = ? ;");
  
  $statement->bind_param("s", $username);
  $statement->execute();
  $result = $statement->get_result();

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
