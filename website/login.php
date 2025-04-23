<?php
session_start();
$conn = new mysqli("localhost", "root", "", "auth_system");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  // Check if the user already exists
  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    // Set the error flag
    $_SESSION['email_exists'] = true;  // Store the flag in session
  } else {
    // Insert the new user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    if ($stmt->execute()) {
      $success = "You have successfully registered! Redirecting...";
      header("refresh:3;url=AAindex.php");
    } else {
      $error = "Error during registration.";
    }
  }
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" class="dark transition-all duration-300">

<head>
  <meta charset="UTF-8">
  <title>Signup Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Background image style */
    body {
      background-image: url('https://uniathenaprods3.uniathena.com/s3fs-public/2024-05/Peer-to-Peer-Learning-Platforms.jpg');
      
      background-size: cover;
      background-attachment: fixed;
    }
  </style>

</head>

<body class="min-h-screen bg-gray-900 transition-all duration-300">

  <!-- Navbar -->
  <header class="bg-[#2c2f48] px-6 py-3 flex justify-between items-center sticky top-0 z-50">
    <div class="text-3xl font-bold text-white">PeerConnect</div>
    <nav>
      <a href="login1.php" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">
        Back
      </a>
    </nav>
  </header>

  <!-- Signup Form -->
  <div class="flex justify-center items-center min-h-screen px-4">
    <div class="w-full max-w-md p-10 bg-[#2c2f48] rounded-3xl  shadow-2xl space-y-6">
      <h2 class="text-3xl font-bold text-center text-white">Sign Up</h2>

      <?php if (!empty($error)) : ?>
        <div class="bg-red-600 text-white p-3 rounded-lg text-center">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($success)) : ?>
        <div class="bg-green-600 text-white p-3 rounded-lg text-center">
          <?= $success ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="mb-4">
          <label class="block text-sm font-semibold text-white">Full Name</label>
          <input type="text" name="name" required
            class="w-full p-3 border border-gray-600 bg-white text-black rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-semibold text-white">Email</label>
          <input type="email" name="email" required
            class="w-full p-3 border border-gray-600 bg-white text-black rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>


        <div class="mb-6">
          <label class="block text-sm font-semibold text-white">Password</label>
          <input type="password" name="password" id="password" required
            class="w-full p-3 border border-gray-600 bg-white text-black rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <button type="button" id="showPass" style="margin-top:5px;" class="text-sm text-blue-600">Show</button>
        </div>


        <button type="submit"
          class="w-full bg-gradient-to-tr from-indigo-500 to-blue-600 text-white py-3 rounded-xl font-semibold hover:scale-105 transition">
          Sign up
        </button>
      </form>
      <!-- Custom popup for already registered user -->
      <div id="popup" class="hidden fixed top-20 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-6 py-4 rounded-lg shadow-lg z-50">
        Email already registered. Please <a href="login1.php" class="underline font-semibold">log in</a>.
        <button id="closePopup" class="ml-4 font-bold">X</button>
      </div>

      <p class="text-center text-sm text-white">
        Already have an account?
        <a href="login1.php" class="text-indigo-400 font-semibold hover:underline">Log in</a>
      </p>
    </div>
  </div>
  <script>
    // Check if the PHP session variable is set and show the popup
    <?php if (isset($_SESSION['email_exists']) && $_SESSION['email_exists'] === true) : ?>
      document.getElementById("popup").classList.remove("hidden");
      <?php unset($_SESSION['email_exists']); ?>
    <?php endif; ?>

    // Show/hide password
    document.getElementById("showPass").onclick = function() {
      const pass = document.getElementById("password");
      if (pass.type === "password") {
        pass.type = "text";
        this.textContent = "Hide";
      } else {
        pass.type = "password";
        this.textContent = "Show";
      }
    };

    // Close the popup
    document.getElementById("closePopup").onclick = function() {
      document.getElementById("popup").classList.add("hidden");
    };
  </script>


</body>

</html>