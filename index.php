<?php 

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

var_dump($connection);