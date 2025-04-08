<?php
require_once 'db.php';

session_start();
$error = ''; // Initialize error variable

if (isset($_POST['login'])) {
  // Basic input validation
  if (empty($_POST['email']) || empty($_POST['password'])) {
    $error = "Please fill in all fields";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
      $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->execute([$email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user && $password == $user['password']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
          header("Location: admin_home.php");
          exit();
        } else {
          header("Location: user_home.php");
          exit();
        }
      } else {
        $error = "Login failed: Invalid email or password";
      }
    } catch (PDOException $e) {
      $error = "Database error: " . $e->getMessage();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <title>Login Page</title>
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
</head>

<body>
  <section class="text-center text-lg-start">
    <div class="card mb-3">
      <div class="row g-0 d-flex align-items-center">
        <div class="col-lg-4 d-none d-lg-flex">
          <img src="login_img.png" alt="login image" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>
        <div class="col-lg-8">
          <div class="card-body py-5 px-md-5">
            <?php if (!empty($error)): ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST">
              <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-control" required />
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required />
              </div>
              <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>