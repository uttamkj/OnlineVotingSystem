<?php
require_once "navbar.php";
?>
<?php

$conn = new mysqli("127.0.0.1", "root", "", "ovs", 3301);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
$query = "SELECT id, party_name FROM parties";
$result = $conn->query($query);

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $partyName = $_POST['party'];
    $checkVote = "SELECT * FROM votes WHERE party_name=?";
    $stmt = $conn->prepare($checkVote);
    $stmt->bind_param("s", $partyName);
    $stmt->execute();
    $voteResult = $stmt->get_result();

    if ($voteResult->num_rows > 0) {
        $message = "You have already voted!";
    } else {
        $insertVote = "INSERT INTO votes (party_name) VALUES (?)";
        $stmt2 = $conn->prepare($insertVote);
        $stmt2->bind_param("s", $partyName);
        if ($stmt2->execute()) {
            $message = "Vote submitted successfully!";
        } else {
            $message = "Error submitting vote!";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote for One Party</title>
    <!-- Bootstrap 5 CSS -->
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Vote for One Indian Political Party</h2>

    <?php if ($message): ?>
        <div class="alert alert-info text-center"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Party Name</th>
                    <!-- <th>Vote</th> -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="align-middle"><?php echo $row['party_name']; ?></td>
                        <!-- <td>
                            <button type="submit" name="party" value="<?php echo $row['party_name']; ?>" class="btn btn-primary">
                                Submit Vote
                            </button>
                        </td> -->
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>
</div>


<script src="./bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
require_once "footer.php";
?>