<?php
require_once 'db.php';

$students = $conn->query("SELECT * FROM student")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Session Manager</title>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="container">
    <div class="card shadow p-4">
      <h2 class="text-center mb-4">Students</h2>
      <table class="table table-bordered table-hover text-center">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Details</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($students as $student): ?>
            <tr>
              <td><?= htmlspecialchars($student['id']) ?></td>
              <td><?= htmlspecialchars($student['name']) ?></td>
              <td><?= htmlspecialchars($student['birthday']) ?></td>
              <td>
                <a href="detailEtudiant.php?id=<?= $student['id'] ?>">
                  <img src="info_icone.png" alt="details" style="width:25px;" />
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>