<?php
// session_start(); already we include navbar file
include_once "navbar.php";
if (isset($_SESSION['name'])) {
   // echo "Welcome " . $_SESSION['name'];
   // echo "Welcome " . $_SESSION['voterID'];
   ?>
   <div class="container text-center mt-3">
        <h1 class="mb-4">Voter Dashboard</h1>
        <a href="candidate_dashboard.php" class="btn btn-primary mb-2" >Update Profile</a>
        <a href="vote.php" class="btn btn-danger mb-2" >Cast Vote</a>
   </div>
   <?php

} else {
   header("location:login.php");
}
?>



<?php
require_once "footer.php"
?>



