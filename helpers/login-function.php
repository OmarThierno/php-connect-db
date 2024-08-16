<?php 
function login($password, $connection, $username) {
  $hashedPassword = md5($password);

  // risk of SQL injection
  // $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$hashedPassword';";
  // $result = $connection->query($sql);

  // protected by injection
  $statement = $connection->prepare("SELECT * FROM `teachers` WHERE `email` = ? AND `password` = ? ;");
  $statement->bind_param("ss", $username, $hashedPassword);
  $statement->execute();
  $result = $statement->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $name = $row["name"];

    $_SESSION["auth"] = true;
    $_SESSION["user_id"] = $id;
    $_SESSION["name"] = $name;
    $_SESSION["username"] = $username;
  }
}