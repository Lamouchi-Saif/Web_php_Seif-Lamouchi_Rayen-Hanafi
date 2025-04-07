<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
  echo "ID not provided";
  exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
  echo "Student not found";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../essential stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Details</title>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
  <h1 class="text-center fw-bold mb-4">Student Details</h1>
  <div class="container">
    <div class="card shadow p-3">
      <h2 class="text-center mb-4"><?= htmlspecialchars($student['name']) ?></h2>
      <div class="row text-center">
        <div class="col-md-6">
          <strong>ID:</strong> <?= htmlspecialchars($student['id']) ?>
        </div>
        <div class="col-md-6">
          <strong>Birthday:</strong> <?= htmlspecialchars($student['birthday']) ?>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Return</a>
      </div>
    </div>
  </div>
</body>

</html>