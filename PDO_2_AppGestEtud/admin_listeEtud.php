<?php
session_start();
require_once 'db.php';
require_once 'students.php';

$stConn = new Student($conn);
$students = $stConn->getAllStudents();

try {

  if (isset($_POST['delete'])) {
    $studentId = $_POST['id'];

    if ($stConn->deleteStudent($studentId)) {
      echo "Student deleted successfully";
    } else {
      echo "Error deleting student";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Session Manager</title>
  <style>
    body {
      padding-top: 80px;
      /* Add padding to prevent navbar from covering content */
    }
  </style>
</head>

<body class="bg-light">
  <!-- Fixed Top Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fs-3 fw-bold" href="admin.php">Student Management System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav fs-4">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Liste des étudiants</a>
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

  <!-- Main Content Container -->
  <div class="container mt-4">
    <div class="card shadow p-4">
      <h2 class="text-center mb-4">Students</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Birthday</th>
              <th>Section</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $student): ?>
              <tr>
                <td><?= htmlspecialchars($student['id']) ?></td>
                <td>
                  <img src="<?= htmlspecialchars($student['image']) ?>"
                    alt="Student image"
                    class="rounded-circle object-fit-cover"
                    style="width:40px; height:40px;">
                </td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['birthday']) ?></td>
                <td><?= htmlspecialchars($student['section']) ?></td>
                <td>
                  <a href="detailEtudiant.php?id=<?= $student['id'] ?>">
                    <img src="../PDO_1_Students/info_icone.png" alt="details" style="width:25px;" />
                  </a>
                  <form method="POST">
                    <input type="hidden" name="id" value="<?= $student['id'] ?>" />
                    <button name="delete" class="btn border-0 p-0">
                      <img src="supp_icone.png" alt="Delete" style="width:30px;" />
                    </button>
                  </form>
                  <a href="edit_student.php?id=<?= $student['id'] ?>">
                    <img src="edit_icone.png" alt="edit" style="width:35px;" />
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>