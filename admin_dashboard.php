<?php
include_once "navbar.php";
if (isset($_SESSION['name'])) {
   // echo "Welcome " . $_SESSION['name'];
} else {
   header("location:login.php");
}
?>

<div class="container text-center mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>
        <a href="addcandidate.php" class="btn btn-primary mb-2" >Add Candidate</a>
        <a href="deleteCandidate.php" class="btn btn-danger mb-2" >Delete Candidate</a>
    </div>


<?php
require_once "footer.php";
?>
