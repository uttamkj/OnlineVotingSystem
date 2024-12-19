<?php
require_once "navbar.php";

if (isset($_POST['login'])) {
    require_once "functions.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "$email $password";

    $res = logIn_admin($email, $password);
    if ($res) {
        $_SESSION['email'] = $email;
        $user  = $res->fetch_assoc();
        $_SESSION['name'] = $user['name'];
        header("location:admin_dashboard.php");
    } else {
?>
        <script>
            alert("Invalid Email or Password");
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <style>
        #error-message {
            opacity: 0.6;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-center mb-4">Admin Login</h4>
                <form action="admin_login.php" method="post" id="login-form">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        <span id="email-error" class="error-message text-danger small"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <span id="password-error" class="error-message text-danger small"></span>
                    </div>
                    <div class="d-grid mt-4">
                        <input type="submit" class="btn btn-primary" id="login-btn" value="Log In" name="login">
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <small class="text-muted">
                        <a href="password.html" class="text-primary">Forgot password?</a>
                    </small><br>
                    <small class="text-muted">Don't have an account?
                        <a href="register.php" class="text-primary">Sign Up</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<?php
require_once "footer.php"
?>