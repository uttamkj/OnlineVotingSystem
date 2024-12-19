<?php
require_once "navbar.php" ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Register</title>
  <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
  <script src="./bootstrap/jquery-3.7.1.js"></script>
  <style>
    .error-message {
      font-size: 0.875rem;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-lg">
          <div class="card-header text-center bg-info text-white">
            <h4 class="mb-0">Register Here</h4>
          </div>
          <div class="card-body">
            <form id="registerForm">
              <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                <div class="error-message" id="nameError"></div>
              </div>
              <div class="mb-3">
                <input type="date" class="form-control" id="date" name="date" max="2006-06-07" required>
                <div class="error-message" id="dateError"></div>
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <div class="error-message" id="emailError"></div>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" id="voterID" name="voterID" placeholder="Voter ID Number" minlength="10" maxlength="10" required>
                <div class="error-message" id="voterIDError"></div>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" minlength="10" maxlength="10" required>
                <div class="error-message" id="mobileError"></div>
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required>
                <div class="error-message" id="passwordError"></div>
              </div>
              <div class="d-grid mt-4">
                <input type="submit" value="Register" class="btn btn-info text-white">
              </div>
              <p id="msg" class="mt-3 text-center"></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $("#registerForm").submit(function (e) {
      e.preventDefault();

      // Reset error messages
      $(".error-message").text("");

      // Form values
      let name = $("#name").val().trim();
      let date = $("#date").val();
      let email = $("#email").val().trim();
      let voterID = $("#voterID").val().trim();
      let mobile = $("#mobile").val().trim();
      let password = $("#password").val();

      // Validation
      let isValid = true;

      if (name.length < 2) {
        $("#nameError").text("Name must be at least 2 characters.");
        isValid = false;
      }

      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        $("#emailError").text("Invalid email format.");
        isValid = false;
      }

      if (!/^[0-9]{10}$/.test(mobile)) {
        $("#mobileError").text("Mobile number must be exactly 10 digits.");
        isValid = false;
      }

      if (password.length < 8) {
        $("#passwordError").text("Password must be at least 8 characters.");
        isValid = false;
      }

      if (!isValid) return;

      $.ajax({
        url: "check_voter.php",
        method: "POST",
        data: {
          "name": name,
          "date": date,
          "email": email,
          "voterID": voterID,
          "mobile": mobile,
          "password": password
        },
        success: function (response) {
          try {
            let data = JSON.parse(response);
            $("#msg").text(data.message).css("color", data.status === "success" ? "green" : "red");
          } catch (error) {
            console.error("Invalid JSON response", response);
            $("#msg").text("An unexpected error occurred.").css("color", "red");
          }
        },
        error: function () {
          $("#msg").text("Failed to register. Please try again later.").css("color", "red");
        }
      });
    });
  </script>
</body>

</html>

<?php
require_once "footer.php" ;
?>
