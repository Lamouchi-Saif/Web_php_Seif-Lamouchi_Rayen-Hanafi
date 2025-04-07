<?php
require_once 'SessionManager.php';
$session = new SessionManager();
$session->start();

if (!$session->has('visits')) {
  $session->set('visits', 1);
  $message = "Welcome! This is your first visit.";
} else {
  $session->increment('visits');
  $nbVisits = $session->get('visits');
  $message = "Welcome back! This is your visit number $nbVisits.";
}
if (isset($_GET['reset'])) {
  $session->destroy();
  header("Location: index.php");
  exit;
}
?>

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
      <h2 class="text-center mb-4">Session </h2>
      <div class="mb-3">
        <div class="alert alert-info text-center" role="alert">
          <?php echo $message; ?>
        </div>
        <div class="text-center mt-4">
          <form action="index.php" method="GET">
            <button type="submit" class="btn btn-primary" name="reset">Reset</button>
          </form>
        </div>
      </div>
    </div>
</body>

</html>