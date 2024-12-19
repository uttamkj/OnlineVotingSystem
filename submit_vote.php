

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['voterID'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ovs";

$conn = new mysqli($servername, $username, $password, $dbname,3301);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prevent multiple voting using voterID
$voter_id = $_SESSION['voterID'];
$check_vote_query = "SELECT * FROM votes WHERE voter_id = ?";
$stmt = $conn->prepare($check_vote_query);
$stmt->bind_param("s", $voter_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User has already voted
    header("Location: vote.php?error=already_voted");
    exit();
}
$stmt->close();

// Process the vote
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $party_id = $_POST['party_id'];
    
    // Insert vote with voter_id
    $insert_vote_query = "INSERT INTO votes (voter_id, party_id, vote_time) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($insert_vote_query);
    $stmt->bind_param("si", $voter_id, $party_id);
    
    if ($stmt->execute()) {
        // Update party vote count
        $update_party_query = "UPDATE parties SET vote_count = vote_count + 1 WHERE id = ?";
        $update_stmt = $conn->prepare($update_party_query);
        $update_stmt->bind_param("i", $party_id);
        $update_stmt->execute();
        
        header("Location: vote.php?success=1");
    } else {
        header("Location: vote.php?error=vote_failed");
    }
    
    $stmt->close();
    $update_stmt->close();
}

$conn->close();
?>