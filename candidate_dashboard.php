<?php
require_once "navbar.php" ;
?>

<?php
include_once "functions.php";
if (isset($_SESSION['name'])) {
    echo "<div class='container mt-3 fs-5 text-center'>";
    echo "Welcome, " . $_SESSION['name'];
    echo "</div>";
} else {
    header("location:login.php");
    exit;
}
$userData = getUser($_SESSION['email']);
$userData = $userData->fetch_assoc();
// echo "$userData";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Your Profile</h4>
                </div>
                <div class="card-body">

                    <?php if ($userData): ?>
                        <form action="" method="POST" id="profileForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $userData['name']; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $userData['mobile']; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $userData['date']; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="voterid" class="form-label">Voter ID:</label>
                                <input type="text" class="form-control" id="voterid" name="voterid" value="<?php echo $userData['voterID']; ?>" readonly>
                            </div>

                            <!-- Edit and Save buttons -->
                            <button type="button" class="btn btn-outline-secondary w-100 mb-2" id="updateBtn" onclick="enableEditing()">Update</button>
                            <button type="submit" class="btn btn-primary w-100" id="saveBtn" name="save" style="display:none;">Save</button>
                        </form>
                    <?php else: ?>
                        <p class="text-center">No user data found.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="dashboard.php" class="btn btn-primary mt-5" >Dashboard</a>
            </div>
        </div>
    </div>
</div>


<?php require_once "footer.php"; ?>

<script>
    function enableEditing() {
        let inputs = document.querySelectorAll('#profileForm input');
        inputs.forEach(function(input) {
            input.removeAttribute('readonly');
        });
        document.getElementById('updateBtn').style.display = 'none';
        document.getElementById('saveBtn').style.display = 'inline-block';
    }
</script>

<?php
if(isset($_POST['save'])){
   $email = $_POST['email'];
   $name = $_POST['name'];
   $mobile = $_POST['mobile'];
   $dob = $_POST['dob'];
   $voterid = $_POST['voterid'];
   $isUpdated = false;
   if ($userData['name'] !== $name || $userData['mobile'] !== $mobile || $userData['date'] !== $dob || $userData['voterID'] !== $voterid) {
      $isUpdated = true;
   }
   if ($isUpdated) {
      $updateSuccess = updateUserProfile($email, $name, $mobile, $dob, $voterid);
      ?>
        <script>
            alert("Profile Updated");
            location.reload();
        </script>
      <?php
   }
}
?>
