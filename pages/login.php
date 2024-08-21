<?php
require_once __DIR__ . "/../helpers/login-function.php";
require_once __DIR__ . "/../helpers/database-conn.php";

if (!isset($_SESSION)) {
  session_start();
}

$connection = startConnection();

// check your login
if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  login($password, $connection, $username);
}

if (isset($_SESSION["auth"]) && $_SESSION["auth"]) {
  header("Location: ../index.php");
}

$connection->close();

// var_dump($_POST);
?>
<?php include __DIR__ . "/../partials/head.php" ?>
<?php if (isset($_GET["logout"])  && $_GET["logout"] === 'success') { ?>
  <div class="alert alert-success text-center mt-4">Logout success</div>
<?php } ?>
<main class="">
  <h1 class="text-center mt-5">Login</h1>
  <div class="row justify-content-center">
    <div class="col-10 col-md-8 col-lg-6">
      <div class="card shadow">
        <div class="card-body">
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label class="form-label" for="username">Username</label>
              <input 
                class="form-control" 
                type="text" 
                id="username" 
                name="username"
                <?php if (isset($_POST["error"]) && $_POST["error"] === "error") { ?>
                  value="<?= $_POST["username"] ?>"
                <?php } ?>
                
              >
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input class="form-control" type="password" id="password" name="password">
              <div class="valid-feedback">hdhdh</div>
            </div>

            <?php if (isset($_POST["error"]) && $_POST["error"] === "error") { ?>
              <div class="alert alert-danger mb-3"><?= "username or password is incorrect" ?></div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . "/../partials/foot.php" ?>