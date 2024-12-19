<?php
$name = $_POST['name'];
$date = $_POST['date'];
$email = $_POST['email'];
$voterID = $_POST['voterID'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

$conn = new mysqli("127.0.0.1","root","","ovs",3301);
if ($conn->connect_error) {
    die(json_encode(["message" => $conn->connect_error, "status" => "error"]));
}

$qry = "SELECT * FROM voter WHERE voterID=?";
$stmt = $conn->prepare($qry);
$stmt->bind_param("s", $voterID);
$stmt->execute();
$result = $stmt->get_result();
$data = [];

if ($result->num_rows > 0) {
    $data["message"] = "Voter ID already exists";
    $data["status"] = "error";
} else {
    $qry2 = "INSERT INTO voter (name, date, email, voterID, mobile, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt2 = $conn->prepare($qry2);
    $stmt2->bind_param("ssssss", $name, $date, $email, $voterID, $mobile, $password);
    if ($stmt2->execute()) {
        $data["message"] = "Register Successful";
        $data["status"] = "success";
    } else {
        $data["message"] = "Database error: " . $stmt2->error;
        $data["status"] = "error";
    }
}

echo json_encode($data);
$conn->close();
?>
