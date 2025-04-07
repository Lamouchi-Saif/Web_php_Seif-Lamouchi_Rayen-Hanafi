<?php
require_once 'db.php';

$students = $conn->query("SELECT * FROM student")->fetchAll(PDO::FETCH_ASSOC);

foreach ($students as $student) {
  echo "ID: " . $student['id'] . "<br>";
  echo "Name: " . $student['name'] . "<br>";
  echo "birthday: " . $student['birthday'] . "<br>";
  echo "<hr>";
}
?>

<!--
<!DOCTYPE html>
<html lang="fr">

<head>
  <link
    rel="stylesheet"
    href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Session Manager</Title>
  </title>
</head>

<body
  class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="container">
    <div class="card shadow p-4">
      <h2 class="text-center mb-4">Students </h2>

    </div>
  </div>
</body>

</html>
-->