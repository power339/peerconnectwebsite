<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $meeting = trim($_POST['meeting_id']);

    // Optional: Validate the meeting ID or link here

    // Example: if it's a link, redirect directly
    if (filter_var($meeting, FILTER_VALIDATE_URL)) {
        header("Location: $meeting");
        exit();
    } else {
        // Otherwise, redirect to a preset meeting system like Jitsi
        $meetingURL = "https://meet.jit.si/" . urlencode($meeting);
        header("Location: $meetingURL");
        exit();
    }
} else {
    header("Location: join.php");
    exit();
}

