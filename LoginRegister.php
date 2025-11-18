<?php
session_start();
require_once 'config.php';

// Handle login form submission
$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $loginError = 'Please enter email and password.';
    } else {
        // Search user by email
        $stmt = $conn->prepare("SELECT lpa_user_ID, lpa_user_username, lpa_user_password, lpa_user_firstname, lpa_user_lastname, lpa_users_email, lpa_user_role FROM lpa_users WHERE lpa_users_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['lpa_user_password'])) {
            // Create session vars that header.php and user_profile.php use
            $_SESSION['user_id']        = $user['lpa_user_ID'];
            $_SESSION['username']       = $user['lpa_user_username'];
            $_SESSION['user_firstname'] = $user['lpa_user_firstname'];
            $_SESSION['user_lastname']  = $user['lpa_user_lastname'];
            $_SESSION['user_email']     = $user['lpa_users_email'];
            $_SESSION['user_role']      = $user['lpa_user_role'];

            // Redirect to home or profile
            header("Location: index.php");
            exit;
        } else {
            $loginError = 'Invalid email or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./image/Logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./font/css/all.css" />
    <link rel="stylesheet" href="./dist/output.css" />
    <script src="./js/script.js" async defer></script>
    <title>LPA-Login</title>
  </head>
  <body class="font-roboto">
    <!---- HEADER START ---->
    <?php include 'header.php'; ?>
    <!---- HEADER END ---->

    <!---- MAIN SECTION START ---->
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-10">
      <div class="login-container bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 id="form-title" class="text-2xl font-semibold mb-6 text-center">Login</h1>

        <?php if (!empty($loginError)): ?>
          <div class="mb-4 text-sm text-red-600 bg-red-100 border border-red-200 rounded px-3 py-2">
              <?php echo htmlspecialchars($loginError); ?>
          </div>
        <?php endif; ?>

        <form id="login-form" method="post" action="LoginRegister.php" class="space-y-4">
          <input type="hidden" name="action" value="login">

          <div class="form-group">
            <label for="email" class="block text-sm font-medium mb-1">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              required
              class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
            >
          </div>

          <div class="form-group">
            <label for="password" class="block text-sm font-medium mb-1">Password:</label>
            <input
              type="password"
              id="password"
              name="password"
              required
              class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
            >
          </div>

          <!-- Campos de registro ocultos por ahora (solo diseño, sin backend) -->
          <div id="register-fields" style="display: none;">
            <div class="form-group">
              <label for="name" class="block text-sm font-medium mb-1">Name:</label>
              <input
                type="text"
                id="name"
                name="name"
                class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
              >
            </div>
            <div class="form-group">
              <label for="last-name" class="block text-sm font-medium mb-1">Last Name:</label>
              <input
                type="text"
                id="last-name"
                name="last-name"
                class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
              >
            </div>
            <div class="form-group">
              <label for="register-phone" class="block text-sm font-medium mb-1">Phone:</label>
              <input
                type="tel"
                id="register-phone"
                name="register-phone"
                class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
              >
            </div>
            <div class="form-group">
              <label for="confirm-password" class="block text-sm font-medium mb-1">Confirm Password:</label>
              <input
                type="password"
                id="confirm-password"
                name="confirm-password"
                class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
              >
            </div>
          </div>

          <div class="flex flex-col space-y-3 mt-4">
            <button type="submit" class="login-btn bg-primary text-white py-2 rounded-md hover:bg-blue-700 transition">
              Login
            </button>
            <button type="button" id="toggle-form" class="register-btn border border-primary text-primary py-2 rounded-md hover:bg-primary hover:text-white transition">
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
    <!---- MAIN SECTION END ---->

    <script src="./js/scriptshop.js"></script>
    <script src="./js/LoginRegister.js"></script>
  </body>
</html>