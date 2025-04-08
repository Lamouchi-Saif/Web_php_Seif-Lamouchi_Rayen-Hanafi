<?php
session_start();
require_once 'db.php';
require_once 'students.php';
require_once 'sections.php';

if (!isset($_GET['id'])) {
  echo "ID not provided";
  header("Location: admin_listeSec.php");
  exit;
}

$id = $_GET['id'];
$secConn = new Section($conn);
$section = $secConn->getSectionById($id);
$stConn = new Student($conn);
$students = $stConn->getStudentBySection($section['designation']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Session Manager</title>
  <style>
    body {
      padding-top: 80px;
    }
  </style>
</head>

<body class="bg-light">
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
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="liste_Etudinat.php">Liste des étudiants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="liste_Section.php">Liste des sections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-4">
    <div class="card shadow p-4">
      <h2 class="text-center mb-4">Students</h2>
      <div class="table-responsive">
        <table id="studentTable" class="table table-bordered table-hover text-center">
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
                  <img src="<?= htmlspecialchars($student['image']) ?>" alt="Student image"
                    class="rounded-circle object-fit-cover" style="width:40px; height:40px;">
                </td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['birthday']) ?></td>
                <td><?= htmlspecialchars($student['section']) ?></td>
                <td>
                  <a href="detailEtudiant.php?id=<?= $student['id'] ?>">
                    <img src="info_icone.png" alt="details" style="width:25px;" />
                  </a>
                  <?php if ($_SESSION['role'] === 'admin'): ?>
                    <form method="POST" style="display:inline;">
                      <input type="hidden" name="id" value="<?= $student['id'] ?>" />
                      <button name="delete" class="btn border-0 p-0">
                        <img src="supp_icone.png" alt="Delete" style="width:30px;" />
                      </button>
                    </form>
                    <a href="edit_student.php?id=<?= $student['id'] ?>">
                      <img src="edit_icone.png" alt="edit" style="width:35px;" />
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      const table = $('#studentTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf'
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>, {
              text: '<img src="add_icone.png" alt="Ajouter étudiant" style="height:25px;">',
              action: function() {
                window.location.href = 'ajouter_etudiant.php';
              }
            }
          <?php endif; ?>
        ],
        language: {
          url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json"
        }
      });
    });
  </script>

</body>

</html>