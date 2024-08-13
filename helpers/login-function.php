<?php 
function login($password, $connection, $usename) {
  $hashedPassword = md5($password);

  // risk of SQL injection
  // $sql = "SELECT * FROM `users` WHERE `username` = '$usename' AND `password` = '$hashedPassword';";
  // $result = $connection->query($sql);

  // protected by injection
  $statement = $connection->prepare("SELECT * FROM `teachers` WHERE `email` = ? AND `password` = ? ;");
  $statement->bind_param("ss", $usename, $hashedPassword);
  $statement->execute();
  $result = $statement->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $usename = $row["name"];

    $_SESSION["user_id"] = $id;
    $_SESSION["name"] = $usename;
  }
}