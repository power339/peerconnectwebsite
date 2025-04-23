<?php
// Database connection (same file)
$host = "localhost";
$user = "root";
$password = "";
$database = "auth_system"; // change this if needed

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $rating = (int)$_POST['rating'];
  $experience = $_POST['experience'];
  $strengths = isset($_POST['strengths']) ? implode(", ", (array)$_POST['strengths']) : '';
  if (!empty($_POST['other_strength'])) {
    $strengths .= ', ' . $_POST['other_strength'];
  }
  $improvements = $_POST['improvements'];
  $recommend = $_POST['recommend'];
  $comments = $_POST['comments'];

  $stmt = $conn->prepare("INSERT INTO reviews (rating, experience, strengths, improvements, recommend, comments) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("isssss", $rating, $experience, $strengths, $improvements, $recommend, $comments);
  $stmt->execute();
  $stmt->close();

  echo "<script>alert('Thank you for your review!');</script>";
}

$allReviews = $conn->query("SELECT * FROM reviews ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <title>PeerConnect - Review</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-[#1e1e2f] to-[#2a2a40] text-white min-h-screen">

  <!-- Header -->
  <header class="bg-[#2c2f48] px-6 py-4 shadow-md flex items-center justify-between">
    <div class="text-xl font-bold tracking-wide">PeerConnect</div>
    <nav>
      <ul class="flex space-x-6 text-sm font-medium">
        <li><a href="AAindex.php" class="hover:text-blue-400 transition">Home</a></li>
        <li><a href="about.php" class="hover:text-blue-400 transition">About</a></li>
        <li><a href="review.php" class="text-blue-400 font-semibold">Review</a></li>
        <li><a href="discussion.php" class="hover:text-blue-400 transition">Discussion Area</a></li>
        <li><a href="join.php" class="hover:text-blue-400 transition">Meetings</a></li>
        <li><a href="dashboard.php" class="hover:text-blue-400 transition">Upload</a></li>
        <li>
          <a href="AAindex.php" class="bg-indigo-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-md transition">
            Back
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Review Section -->
  <section class="px-6 py-16 max-w-3xl mx-auto">
    <h1 class="text-3xl font-semibold text-center mb-8 border-b border-blue-500 pb-2">Peer-to-Peer Learning Platform Review</h1>

    <form id="reviewForm" class="bg-[#2c2f48] p-6 rounded-lg shadow-xl" method="POST">
      <h2 class="text-xl font-semibold mb-4 text-blue-400">Share Your Feedback</h2>

      <!-- Rating -->
      <div class="mb-6">
        <label class="block mb-2 font-semibold">Rating:</label>
        <div class="flex text-3xl space-x-1 cursor-pointer text-yellow-400" id="starRating">
          <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
        </div>
        <input type="hidden" id="ratingValue" name="rating" value="0">
      </div>

      <!-- Experience -->
      <div class="mb-6">
        <label for="experience" class="block mb-2 font-semibold">Your Experience:</label>
        <textarea id="experience" name="experience" class="w-full p-3 rounded-md bg-[#1e1e2f] border border-gray-600 text-white" placeholder="Describe your experience..."></textarea>
      </div>

      <!-- Strengths -->
      <div class="mb-6">
        <label class="block mb-2 font-semibold">Strengths:</label>
        <div class="space-y-2">
          <label><input type="checkbox" name="strengths[]" value="collaboration" class="mr-2">Collaborative learning features</label><br>
          <label><input type="checkbox" name="strengths[]" value="sharing" class="mr-2">Easy resource sharing</label><br>
          <label><input type="checkbox" name="strengths[]" value="interface" class="mr-2">User-friendly interface</label><br>
          <label class="flex items-center">
            <input type="checkbox" name="strengths[]" value="other" class="mr-2">Other:
            <input type="text" id="otherStrength" name="other_strength" class="ml-2 p-2 bg-[#1e1e2f] border border-gray-600 rounded-md text-white w-full">
          </label>
        </div>
      </div>

      <!-- Improvements -->
      <div class="mb-6">
        <label for="improvements" class="block mb-2 font-semibold">Areas for Improvement:</label>
        <textarea id="improvements" name="improvements" class="w-full p-3 rounded-md bg-[#1e1e2f] border border-gray-600 text-white" placeholder="What could be better?"></textarea>
      </div>

      <!-- Recommend -->
      <div class="mb-6">
        <label class="block mb-2 font-semibold">Would you recommend this platform?</label>
        <div class="space-x-4">
          <label><input type="radio" name="recommend" value="yes" class="mr-1">Yes</label>
          <label><input type="radio" name="recommend" value="no" class="mr-1">No</label>
        </div>
      </div>

      <!-- Additional Comments -->
      <div class="mb-6">
        <label for="comments" class="block mb-2 font-semibold">Additional Comments:</label>
        <textarea id="comments" name="comments" class="w-full p-3 rounded-md bg-[#1e1e2f] border border-gray-600 text-white" placeholder="Any other feedback..."></textarea>
      </div>

      <!-- Buttons -->
      <div class="flex justify-center space-x-6 mt-8">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-md transition">Submit Review</button>
        <button type="reset" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md transition">Reset</button>
      </div>
    </form>

    <!-- Display Reviews -->
    <section class="mt-16 bg-[#1e1e2f] p-6 rounded-lg border border-blue-400">
      <h2 class="text-2xl font-semibold text-blue-300 mb-6">📝 What Others Are Saying</h2>

      <?php if ($allReviews->num_rows > 0): ?>
        <?php while ($review = $allReviews->fetch_assoc()): ?>
          <div class="mb-6 p-4 bg-[#2c2f48] rounded-lg shadow">
            <div class="flex items-center justify-between mb-2">
              <p class="text-yellow-400">Rating: <?= str_repeat('★', $review['rating']) ?><?= str_repeat('☆', 5 - $review['rating']) ?></p>
              <span class="text-sm text-gray-400"><?= date("d M Y, h:i A", strtotime($review['submitted_at'])) ?></span>
            </div>
            <p><strong class="text-blue-300">Experience:</strong> <?= nl2br(htmlspecialchars($review['experience'])) ?></p>
            <p><strong class="text-blue-300">Strengths:</strong> <?= htmlspecialchars($review['strengths']) ?></p>
            <p><strong class="text-blue-300">Improvements:</strong> <?= nl2br(htmlspecialchars($review['improvements'])) ?></p>
            <p><strong class="text-blue-300">Recommendation:</strong> <?= ucfirst($review['recommend']) ?></p>
            <?php if (!empty($review['comments'])): ?>
              <p><strong class="text-blue-300">Comments:</strong> <?= nl2br(htmlspecialchars($review['comments'])) ?></p>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-gray-400">No reviews submitted yet. Be the first!</p>
      <?php endif; ?>
    </section>
  </section>

  <!-- Footer -->
  <footer class="text-center mt-16 text-sm text-gray-400 italic bg-black text-white font-semibold p-3">
    Thank you for helping improve this learning platform with your feedback!
  </footer>

  <script>
    const stars = document.querySelectorAll('#starRating span');
    const ratingValue = document.getElementById('ratingValue');

    stars.forEach((star, index) => {
      star.addEventListener('click', () => {
        stars.forEach((s, i) => {
          s.textContent = i <= index ? '★' : '☆';
        });
        ratingValue.value = index + 1;
      });
    });
  </script>
</body>

</html>