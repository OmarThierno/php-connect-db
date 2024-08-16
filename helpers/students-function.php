<?php 

function getStudents($connection, $username, $search) {
  if($search === null) {
    $search = "%";
  } else if ($search === '') {
    $search = "%";
  } else {
    $search = $search . '%';
  }

  $statement = $connection->prepare("SELECT DISTINCT `students`.`id`, `students`.`degree_id`, `students`.`name`, `students`.`surname`, `students`.`date_of_birth`, `students`.`fiscal_code`, `students`.`enrolment_date`, `students`.`registration_number`, `students`.`email`
    FROM `students`
    INNER JOIN `degrees`
    ON `students`.`degree_id` = `degrees`.`id`
    INNER JOIN `courses`
    ON `degrees`.`id` = `courses`.`degree_id`
    INNER JOIN `course_teacher`
    ON `courses`.`id` = `course_teacher`.`course_id`
    INNER JOIN `teachers`
    ON `course_teacher`.`teacher_id` = `teachers`.`id`
    WHERE `teachers`.`email` = ? 
    AND `students`.`name` LIKE ?
    ORDER BY `students`.`name`;");
  
  $statement->bind_param("ss", $username, $search);
  $statement->execute();
  $result = $statement->get_result();

  $students= [];

  if($result && $result->num_rows > 0) {
    $row = $result->fetch_object();

    while($row) {
      $newStudent = new Student($row->id, $row->degree_id, $row->name, $row->surname);
      $newStudent->setDateOfBirth($row->date_of_birth);
      $newStudent->setFiscal_code($row->fiscal_code);
      $newStudent->setEnrolment_date($row->enrolment_date);
      $newStudent->setRegistration_number($row->registration_number);
      $newStudent->setEmail($row->email);

      $students[] = $newStudent;

      $row = $result->fetch_object();
    }
  }

  return $students;
}