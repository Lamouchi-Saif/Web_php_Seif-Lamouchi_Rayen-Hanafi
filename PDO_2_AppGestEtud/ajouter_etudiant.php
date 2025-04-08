<?php
session_start();
require_once 'db.php';
require_once 'students.php';


$stconn = new Student($conn);

if (isset($_POST['submit'])) {
  $name = htmlspecialchars($_POST['name']);
  $image = filter_var($_POST['image'], FILTER_SANITIZE_URL);
  $section = htmlspecialchars($_POST['section']);
  $birthday = htmlspecialchars($_POST['birthday']);
  $stconn->addStudent($name, $birthday, $image, $section);

  header("Location: liste_Etudiant.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Ajouter un étudiant</h2>
    <form method="POST">
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">
          Informations
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="col-md-6">
              <label for="image" class="form-label">Image link</label>
              <input type="url" class="form-control" id="image" name="image" placeholder="Enter Image link">
            </div>
            <div class="col-md-6">
              <label for="section" class="form-label">Section</label>
              <select class="form-select" id="section" name="section">
                <option>RT</option>
                <option>GL</option>
                <option>IMI</option>
                <option>IIA</option>
                <option>CH</option>
                <option>BIO</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="birthday" class="form-label">Birthday</label>
              <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Enter birthday">
            </div>
          </div>
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="liste_Etudiant.php"><button type="button" class="btn btn-secondary me-md-2">Return</button></a>
        <button type="reset" class="btn btn-secondary me-md-2">Reset</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </form>
  </div>
</body>

</html>