<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];
$stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, comments) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $rating, $comments);

if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
