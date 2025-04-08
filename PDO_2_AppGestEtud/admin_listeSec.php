<?php
session_start();
require_once 'db.php';
require_once 'sections.php';

$secConn = new Section($conn);
$Sections = $secConn->getAllsection();

try {
  if (isset($_POST['delete'])) {
    $SectionId = $_POST['id'];
    if ($secConn->deleteSection($SectionId)) {
      echo "Section deleted successfully";
    } else {
      echo "Error deleting section";
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
      <a class="navbar-brand fs-3 fw-bold" href="admin.php">Section Management System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav fs-4">
          <li class="nav-item">
            <a class="nav-link" href="admin_home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_listeEtud.php">Liste des étudiants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_listeSec.php">Liste des sections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-4">
    <div class="card shadow p-4">
      <h2 class="text-center mb-4">Sections</h2>
      <div class="table-responsive">
        <table id="SectionTable" class="table table-bordered table-hover text-center">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Designation</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Sections as $Section): ?>
              <tr>
                <td><?= htmlspecialchars($Section['id']) ?></td>
                <td><?= htmlspecialchars($Section['designation']) ?></td>
                <td><?= htmlspecialchars($Section['description']) ?></td>
                <td>
                  <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $Section['id'] ?>" />
                    <button name="delete" class="btn border-0 p-0">
                      <img src="supp_icone.png" alt="Delete" style="width:30px;" />
                    </button>
                  </form>
                  <a href="edit_Section.php?id=<?= $Section['id'] ?>">
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
  <script>
    $(document).ready(function() {
      $('#SectionTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        language: {
          url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json"
        }
      });
    });
  </script>
</body>

</html>