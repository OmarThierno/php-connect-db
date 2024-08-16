<?php

function getStudentDetail($connection, $username, $id) {

  $statement = $connection->prepare("SELECT 
    `students`.`id`, 
    `students`.`name`, 
    `students`.`surname`, 
    `students`.`date_of_birth`, 
    `students`.`fiscal_code`, 
    `students`.`registration_number`, 
    `students`.`email`, 
    `degrees`.`name` AS degree_name, 
    `degrees`.`level`, 
    AVG(`exam_student`.`vote`) AS average_vote,
    COUNT(`students`.`id`) AS how_many_times
FROM `students`
INNER JOIN `exam_student` ON `students`.`id` = `exam_student`.`student_id`
INNER JOIN `degrees` ON `students`.`degree_id` = `degrees`.`id`
INNER JOIN `exams` ON `exam_student`.`exam_id` = `exams`.`id`
INNER JOIN `courses` ON `exams`.`course_id` = `courses`.`id`
INNER JOIN `course_teacher` ON `courses`.`id` = `course_teacher`.`course_id`
INNER JOIN `teachers` ON `course_teacher`.`teacher_id` = `teachers`.`id`
WHERE `teachers`.`email` = ? AND `students`.`id` = ?
GROUP BY `students`.`id`;");

  $statement->bind_param("si", $username, $id);
  $statement->execute();
  $result = $statement->get_result();

  $student = $result->fetch_assoc();

  return $student;
}