<?php
session_start();

// Get the submitted flag and challenge ID from the form
$submitted_flag = $_POST['flag'];
$challenge_id = $_POST['challenge_id'];

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'kavasam');

// Check if a score for this challenge by this user already exists
$result = $db->query(sprintf(
    "SELECT * FROM scores WHERE id = '%s' AND challenge_id = '%s'",
    $db->real_escape_string($_SESSION['user']['id']),
    $db->real_escape_string($challenge_id)
));

if ($result->num_rows > 0) {
    // A score for this challenge by this user already exists
    echo json_encode(['success' => false, 'message' => 'You have already submitted this flag.']);
    exit();

} else {
    // No score for this challenge by this user exists, insert a new one
    $db->query(sprintf(
        "INSERT INTO scores (id, challenge_id, score) VALUES ('%s', '%s', 10)",
        $db->real_escape_string($_SESSION['user']['id']),
        $db->real_escape_string($challenge_id)
    ));

    echo "<script>alert('Correct flag! 10 points have been added to your score.');</script>";
}

// Check if the challenge exists
$result = $db->query(sprintf(
    "SELECT * FROM challenges WHERE id = '%s'",
    $db->real_escape_string($challenge_id)
));

if ($result->num_rows > 0) {
    // The challenge exists, get the correct flag
    $challenge = $result->fetch_assoc();
    $correct_flag = $challenge['correct_flag'];

    // Check if the submitted flag is correct
    if ($submitted_flag === $correct_flag) {
        // The flag is correct, insert a new row into the scores table
        $db->query(sprintf(
            "INSERT INTO scores (id, challenge_id, score) VALUES ('%s', '%s', 10)",
            $db->real_escape_string($_SESSION['user']['id']),
            $db->real_escape_string($challenge_id)
        ));

        echo "<script>alert('Correct flag! 10 points have been added to your score.');</script>";
    } else {
        echo "<script>alert('Incorrect flag.');</script>";
    }
} else {
    echo "<script>alert('Challenge does not exist.');</script>";
}
?>