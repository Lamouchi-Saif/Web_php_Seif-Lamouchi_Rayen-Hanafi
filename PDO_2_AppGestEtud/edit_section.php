<?php
session_start();
require_once 'db.php';
require_once 'sections.php';

if (!isset($_GET['id'])) {
  echo "ID not provided";
  header("Location: admin_listeSec.php");
  exit;
}

$id = $_GET['id'];
$stconn = new Section($conn);
$section = $stconn->getsectionById($id);

if (!$section) {
  echo "section not found";
  header("Location: admin_listeSec.php");
  exit;
}

if (isset($_POST['submit'])) {
  $designation = htmlspecialchars($_POST['designation']);
  $descriptiion = htmlspecialchars($_POST['description']);
  $stconn->updateSection($id, $designation, $descriptiion);

  header("Location: admin_listeSec.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit section</title>
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Modifier informations d'un étudiant</h2>
    <form method="POST">
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">
          Informations
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="designation" class="form-label">Designation</label>
              <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation" value="<?= htmlspecialchars($section['designation']) ?>">
            </div>
            <div class="col-md-6">
              <label for="description" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" value="<?= htmlspecialchars($section['description']) ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="admin_listeSec.php"><button type="button" class="btn btn-secondary me-md-2">Return</button></a>
        <button type="reset" class="btn btn-secondary me-md-2">Reset</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </form>
  </div>
</body>

</html>