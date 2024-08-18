<?php

// var_dump($_POST);
if(!isset($_SESSION)) {
  session_start();
}

if(isset($_POST["logout"]) && $_POST["logout"] === "out") {
  session_destroy();
  header("Location: login.php?logout=success");
} else {
  header("Location: ../index.php");
}