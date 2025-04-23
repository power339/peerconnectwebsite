<?php
session_start();
include 'db.php'; // your DB connection file

// Assume you store user_id in session after login
$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT is_admin FROM users WHERE id = $user_id");
$row = mysqli_fetch_assoc($query);
$is_admin = $row['is_admin'] ?? 0;

if ($is_admin) {
  // Show admin-only content
  echo '<a href="create_meeting.php" class="text-cyan-400 underline">Create Meeting</a>';
}
?>
