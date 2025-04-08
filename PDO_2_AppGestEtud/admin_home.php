<?php
session_start();
require_once 'db.php';

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light py-4">
    <div class="container">
      <a class="navbar-brand fs-3 fw-bold" href="admin.php">Student Management System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav fs-4">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liste des étudiants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liste des sections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card shadow p-4">
      <h1 class="text-center mb-3">Welcome <?= $username ?><br>to the <?= $role ?> page </h2>
    </div>
  </div>
</body>

</html>