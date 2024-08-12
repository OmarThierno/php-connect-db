<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <!-- NavBar  -->
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul>
          <div class="d-flex align-items-center gap-2">
            <?php if(!empty($_SESSION["user_id"]) && !empty($_SESSION["username"])) {?>
            <span>Ciao <?= $_SESSION["username"] ?> </span>

            <form action="logout.php" method="POST">
              <input type="hidden" name="logout" id="" value="out">
              <button class="btn btn-danger" type="submit">Logout</button>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- /NavBar  -->