<?php
    require_once "navbar.php";
?>
<?php


// Check if user is logged in using voterID
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

// Check if user has already voted using voterID
$voter_id = $_SESSION['voterID'];
$check_vote_query = "SELECT * FROM votes WHERE voter_id = ?";
$stmt = $conn->prepare($check_vote_query);
$stmt->bind_param("s", $voter_id);
$stmt->execute();
$result = $stmt->get_result();

$has_voted = ($result->num_rows > 0);
$stmt->close();

// Get voter details
$voter_query = "SELECT name, email FROM voter WHERE voterID = ?";
$stmt = $conn->prepare($voter_query);
$stmt->bind_param("s", $voter_id);
$stmt->execute();
$voter_result = $stmt->get_result();
$voter_details = $voter_result->fetch_assoc();
$stmt->close();

// Fetch available parties
$parties_query = "SELECT * FROM parties";
$parties_result = $conn->query($parties_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Page</title>
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Voting Portal</h3>
                    </div>
                    <div class="card-body">
                        <!-- Display voter information -->
                        <div class="mb-3">
                            <p><strong>Voter Name:</strong> <?php echo htmlspecialchars($voter_details['name']); ?></p>
                            <p><strong>Voter ID:</strong> <?php echo htmlspecialchars($voter_id); ?></p>
                        </div>

                        <?php if (!$has_voted): ?>
                            <form action="submit_vote.php" method="POST">
                                <div class="mb-3">
                                    <label for="party" class="form-label">Select a Party</label>
                                    <select class="form-select" id="party" name="party_id" required>
                                        <option value="">Choose a Party</option>
                                        <?php while($party = $parties_result->fetch_assoc()): ?>
                                            <option value="<?php echo $party['id']; ?>">
                                                <?php echo htmlspecialchars($party['party_name']); ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Cast Your Vote</button>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-warning text-center">
                                You have already cast your vote. Thank you for participating!
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./bootstrap/bootstrap.bundle.js"></script>
</body>
</html>

<?php
$conn->close();
?>

<?php
    require_once "footer.php";
?>