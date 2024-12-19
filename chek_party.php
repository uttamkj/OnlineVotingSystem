<?php
$pname = $_POST['pname'];

$conn = new mysqli("127.0.0.1","root","","ovs",3301);
if ($conn->connect_error) {
    die(json_encode(["message" => $conn->connect_error, "status" => "error"]));
}

$qry = "SELECT * FROM parties WHERE party_name=?";
$stmt = $conn->prepare($qry);
$stmt->bind_param("s", $pname);
$stmt->execute();
$result = $stmt->get_result();
$data = [];

if ($result->num_rows > 0) {
    $data["message"] = "Party name already exists";
    $data["status"] = "error";
} else {
    $qry2 = "INSERT INTO parties(party_name) VALUES (?)";
    $stmt2 = $conn->prepare($qry2);
    $stmt2->bind_param("s", $pname);
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
