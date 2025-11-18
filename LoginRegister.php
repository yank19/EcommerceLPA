<?php
session_start();
require_once 'config.php';

// Variables para mensajes
$loginError = '';
$registerError = '';
$registerSuccess = '';

// ============================================
// HANDLE LOGIN
// ============================================
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
            // Create session vars
            $_SESSION['user_id']        = $user['lpa_user_ID'];
            $_SESSION['username']       = $user['lpa_user_username'];
            $_SESSION['user_firstname'] = $user['lpa_user_firstname'];
            $_SESSION['user_lastname']  = $user['lpa_user_lastname'];
            $_SESSION['user_email']     = $user['lpa_users_email'];
            $_SESSION['user_role']      = $user['lpa_user_role'];

            // Redirect to home
            header("Location: index.php");
            exit;
        } else {
            $loginError = 'Invalid email or password.';
        }
    }
}

// ============================================
// HANDLE REGISTER
// ============================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $username       = trim($_POST['username'] ?? '');
    $firstname      = trim($_POST['name'] ?? '');
    $lastname       = trim($_POST['last-name'] ?? '');
    $email          = trim($_POST['email'] ?? '');
    $phone          = trim($_POST['register-phone'] ?? '');
    $password       = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';

    // Validaciones básicas
    if ($username === '' || $firstname === '' || $lastname === '' || $email === '' || $password === '') {
        $registerError = 'All fields are required.';
    } elseif ($password !== $confirmPassword) {
        $registerError = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $registerError = 'Password must be at least 6 characters.';
    } else {
        // Verificar si el email ya existe
        $stmt = $conn->prepare("SELECT lpa_user_ID FROM lpa_users WHERE lpa_users_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $registerError = 'Email already registered.';
            $stmt->close();
        } else {
            $stmt->close();

            // Verificar si el username ya existe
            $stmt = $conn->prepare("SELECT lpa_user_ID FROM lpa_users WHERE lpa_user_username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $registerError = 'Username already taken.';
                $stmt->close();
            } else {
                $stmt->close();

                // Hash de la contraseña
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insertar nuevo usuario (SIN teléfono)
$stmt = $conn->prepare("INSERT INTO lpa_users (lpa_user_username, lpa_user_firstname, lpa_user_lastname, lpa_users_email, lpa_user_password, lpa_user_role) VALUES (?, ?, ?, ?, ?, 'customer')");
$stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $hashedPassword);

if ($stmt->execute()) {
    $registerSuccess = 'Registration successful! You can now log in.';
    $stmt->close();
} else {
    $registerError = 'Error creating account: ' . $stmt->error;
    $stmt->close();
}
            }
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
    <title>LPA - Login / Register</title>
  </head>
  <body class="font-roboto">
    <!---- HEADER START ---->
    <?php include 'header.php'; ?>
    <!---- HEADER END ---->

    <!---- MAIN SECTION START ---->
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-10">
      <div class="login-container bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 id="form-title" class="text-2xl font-semibold mb-6 text-center">Login</h1>

        <!-- Mensajes de error/éxito de LOGIN -->
        <?php if (!empty($loginError)): ?>
          <div class="mb-4 text-sm text-red-600 bg-red-100 border border-red-200 rounded px-3 py-2">
            <?php echo htmlspecialchars($loginError); ?>
          </div>
        <?php endif; ?>

        <!-- Mensajes de error/éxito de REGISTER -->
        <?php if (!empty($registerError)): ?>
          <div class="mb-4 text-sm text-red-600 bg-red-100 border border-red-200 rounded px-3 py-2">
            <?php echo htmlspecialchars($registerError); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($registerSuccess)): ?>
          <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded px-3 py-2">
            <?php echo htmlspecialchars($registerSuccess); ?>
          </div>
        <?php endif; ?>

        <form id="login-form" method="post" action="LoginRegister.php" class="space-y-4">
          <!-- Campo oculto que cambia entre 'login' y 'register' -->
          <input type="hidden" name="action" id="form-action" value="login">

          <!-- Campo Username (solo visible en registro) -->
          <div class="form-group" id="username-field" style="display: none;">
            <label for="username" class="block text-sm font-medium mb-1">Username:</label>
            <input
              type="text"
              id="username"
              name="username"
              class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
            >
          </div>

          <!-- Email (siempre visible) -->
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

          <!-- Password (siempre visible) -->
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

          <!-- Campos adicionales de registro (ocultos por defecto) -->
          <div id="register-fields" style="display: none;">
            <div class="form-group">
              <label for="name" class="block text-sm font-medium mb-1">First Name:</label>
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
            <button type="submit" id="submit-btn" class="login-btn bg-primary text-white py-2 rounded-md hover:bg-blue-700 transition">
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

    <script>
      // Script para alternar entre Login y Register
      const toggleBtn = document.getElementById('toggle-form');
      const formTitle = document.getElementById('form-title');
      const submitBtn = document.getElementById('submit-btn');
      const formAction = document.getElementById('form-action');
      const registerFields = document.getElementById('register-fields');
      const usernameField = document.getElementById('username-field');

      let isLogin = true;

      toggleBtn.addEventListener('click', () => {
        isLogin = !isLogin;

        if (isLogin) {
          // Modo Login
          formTitle.textContent = 'Login';
          submitBtn.textContent = 'Login';
          toggleBtn.textContent = 'Register';
          formAction.value = 'login';
          registerFields.style.display = 'none';
          usernameField.style.display = 'none';
        } else {
          // Modo Register
          formTitle.textContent = 'Register';
          submitBtn.textContent = 'Register';
          toggleBtn.textContent = 'Back to Login';
          formAction.value = 'register';
          registerFields.style.display = 'block';
          usernameField.style.display = 'block';
        }
      });
    </script>

    <script src="./js/scriptshop.js"></script>
  </body>
</html>