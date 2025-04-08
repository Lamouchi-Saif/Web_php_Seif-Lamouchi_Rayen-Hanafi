<?php
require_once 'db.php';
require_once 'students.php';

if (!isset($_GET['id'])) {
  echo "ID not provided";
  exit;
}

$id = $_GET['id'];
$stconn = new Student($conn);
$student = $stconn->getStudentById($id);

if (!$student) {
  echo "Student not found";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Details</title>
  <style>
    .student-image-container {
      max-width: 300px;
      margin: 0 auto;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow">
          <div class="row g-0">
            <!-- Student Image -->
            <div class="col-md-5 text-center p-4">
              <div class="student-image-container">
                <img src="<?= htmlspecialchars($student['image']) ?>"
                  alt="Student image"
                  class="img-fluid rounded-circle border border-4 border-light shadow"
                  style="width: 200px; height: 200px; object-fit: cover;">
              </div>
            </div>

            <!-- Student Details -->
            <div class="col-md-7">
              <div class="card-body">
                <h2 class="card-title text-center mb-4"><?= htmlspecialchars($student['name']) ?></h2>

                <div class="row">
                  <div class="col-6 mb-3">
                    <strong class="d-block">ID:</strong>
                    <?= htmlspecialchars($student['id']) ?>
                  </div>

                  <div class="col-6 mb-3">
                    <strong class="d-block">Section:</strong>
                    <?= htmlspecialchars($student['section']) ?>
                  </div>

                  <div class="col-12 mb-3">
                    <strong class="d-block">Birthday:</strong>
                    <?= htmlspecialchars($student['birthday']) ?>
                  </div>
                </div>

                <div class="text-center mt-4">
                  <a href="admin_listeEtud.php" class="btn btn-secondary">Return</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>