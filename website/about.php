<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <title>About - PeerConnect</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-[#1e1e2f] to-[#2a2a40] text-white">

  <!-- Header -->
  <header class="bg-[#2c2f48] px-6 py-4 shadow-md flex items-center justify-between">
    <div class="text-xl font-bold tracking-wide">PeerConnect</div>
    <nav>
      <ul class="flex space-x-6 text-sm font-medium">
        <li><a href="AAindex.php" class="hover:text-blue-400 transition">Home</a></li>
        <li><a href="about.php" class="text-blue-400 font-semibold">About</a></li>
        <li><a href="review.php" class="hover:text-blue-400 transition">Review</a></li>
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

  <!-- About Section with Cards -->
  <section class="py-20 px-6 max-w-6xl mx-auto text-center">
    <h1 class="text-4xl font-bold mb-12 text-white">✨ About PeerConnect</h1>

    <div class="grid md:grid-cols-2 gap-10">

      <!-- Card 1 -->
      <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg hover:shadow-blue-500/30 transition duration-300">
        <h2 class="text-xl font-semibold mb-4 text-blue-300">✅ What is PeerConnect?</h2>
        <p class="text-gray-200 text-sm leading-relaxed">
          PeerConnect is a student-powered platform for collaborative learning. Whether you're stuck on an assignment or want to share helpful notes, PeerConnect connects you with classmates and study buddies to level up your academic journey.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg hover:shadow-pink-500/30 transition duration-300">
        <h2 class="text-xl font-semibold mb-4 text-pink-300">🌟 Our Mission</h2>
        <p class="text-gray-200 text-sm leading-relaxed">
          To foster peer-to-peer learning through open sharing of resources, real-time discussions, and virtual study rooms — because learning is better when it's shared.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="md:col-span-2 backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg hover:shadow-purple-500/30 transition duration-300">
        <h2 class="text-xl font-semibold mb-4 text-purple-300">⚙️ Core Features</h2>
        <ul class="list-disc pl-6 space-y-2 text-left text-gray-200 text-sm">
          <li><strong>📚 Resource Sharing:</strong> Upload and access notes, files, and learning materials.</li>
          <li><strong>🧠 Group Study Rooms:</strong> Join live study sessions and collaborate in real-time.</li>
          <li><strong>💬 Discussion Areas:</strong> Ask questions, share ideas, and solve problems together.</li>
          <li><strong>🔒 Secure Access:</strong> Registered users only for safe academic collaboration.</li>
        </ul>
      </div>

    </div>

    <!-- Call to Action -->
    <div class="mt-16">
      <p class="text-lg text-white mb-4 font-medium">Ready to collaborate and grow together?</p>
      <a href="login1.php" class="inline-block bg-indigo-600 hover:bg-blue-600 text-white text-lg px-6 py-3 rounded-xl shadow-lg transition">
        Join PeerConnect Now 🚀
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gradient-to-br from-indigo-700 via-indigo-800 to-indigo-900 text-white py-16 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-12">
      <div>
        <h3 class="text-2xl font-bold mb-4">PeerConnect 🚀</h3>
        <p class="text-sm text-indigo-200">Empowering students through collaboration and shared knowledge. Join us and grow together in a vibrant academic community.</p>
      </div>
      <div>
        <h4 class="text-xl font-semibold mb-4 text-pink-300">Quick Links</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="AAindex.php" class="hover:text-pink-400 transition">Home</a></li>
          <li><a href="about.php" class="hover:text-pink-400 transition">About</a></li>
          <li><a href="review.php" class="hover:text-pink-400 transition">Review</a></li>
          <li><a href="discussion.php" class="hover:text-pink-400 transition">Discussion</a></li>
          <li><a href="join.php" class="hover:text-pink-400 transition">Meetings</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-xl font-semibold mb-4 text-pink-300">Stay Connected</h4>
        <p class="text-sm text-indigo-200 mb-2">Follow us on social media to stay updated!</p>
        <div class="flex space-x-4">
          <a href="#" class="hover:text-pink-400">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.46 6c-.77.35-1.6.59-2.46.7a4.28 4.28 0 001.88-2.36 8.62 8.62 0 01-2.7 1.03A4.26 4.26 0 0016.1 4c-2.38 0-4.3 1.92-4.3 4.3 0 .34.04.67.1.99-3.57-.18-6.73-1.89-8.84-4.48a4.3 4.3 0 00-.58 2.17c0 1.5.76 2.82 1.91 3.6a4.25 4.25 0 01-1.95-.54v.06c0 2.1 1.5 3.86 3.5 4.26a4.3 4.3 0 01-1.94.07 4.3 4.3 0 004.02 2.99A8.6 8.6 0 014 19.54 12.14 12.14 0 0010.29 21c7.55 0 11.68-6.26 11.68-11.68 0-.18-.01-.36-.02-.54A8.36 8.36 0 0024 6.54a8.6 8.6 0 01-2.54.7z" />
            </svg>
          </a>
          <!-- GitHub Icon -->
          <a href="#" class="hover:text-pink-400">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.4 2.85 8.14 6.79 9.45.5.1.68-.21.68-.47v-1.7c-2.76.6-3.35-1.33-3.35-1.33-.45-1.14-1.11-1.45-1.11-1.45-.9-.61.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.53 2.33 1.09 2.9.83.09-.65.35-1.1.64-1.35-2.21-.25-4.55-1.11-4.55-4.95 0-1.1.39-2 .1-2.7 0 0 .83-.27 2.73 1.02A9.42 9.42 0 0112 6.8c.85 0 1.7.11 2.5.32 1.9-1.29 2.73-1.02 2.73-1.02.29.7.1 1.6.1 2.7 0 3.85-2.34 4.7-4.57 4.95.36.3.69.91.69 1.84v2.72c0 .27.18.58.7.48A10 10 0 0022 12c0-5.5-4.46-9.96-10-9.96z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
    <div class="text-center mt-10 text-sm text-indigo-300">© 2025 PeerConnect. Crafted with 💙 for learners everywhere.</div>
  </footer>

</body>

</html>