<?php
include_once "navbar.php";
?>
<div class="w-25 mx-auto">
    <h3 class="text-center">Update Password</h3>
    <form action="" method="post" class="form">
        <input type="password" placeholder="Enter Current Password" name="oldPass" class="form-control mb-2">
        <input type="password" placeholder="Enter New Password" name="newPass" class="form-control mb-2">
        <p id="msg"class="text-center"></p>
        <div class=" d-flex justify-content-center">
            <input type="submit" value="Change" name="change" class="btn btn-info ">
        </div>
    </form>
</div>
<?php
if(isset($_POST['change'])){
    require_once "functions.php";
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $email = $_SESSION['email'];
    echo $email;
    $status = getUser($email);
    $user = $status->fetch_assoc();
    $dbPass = $user['password'];
    if($oldPass === $newPass){
        ?>
        <script>
            document.querySelector("#msg").innerHTML = "Password must not be same"
            document.querySelector("#msg").style.color = "red"
        </script>
        <?php
    }else if($dbPass !== $oldPass){
        ?>
        <script>
            document.querySelector("#msg").innerHTML = "Current password is wrong"
            document.querySelector("#msg").style.color = "red"
        </script>
        <?php
    }
    else{
        
        $res = updatePassword($email,$newPass);
        if($res){
            ?>
            <script>
               document.querySelector("#msg").innerHTML = "Password changed"
               document.querySelector("#msg").style.color = "green"
            </script>
            <?php
        }
    }

}
?>

<?php
require_once "footer.php"
?>