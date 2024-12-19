<?php
include_once "navbar.php";
?>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white text-center">
            <h3>Enter Party Name</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" id="partyAdd">
                <!-- Party Name Input -->
                <div class="mb-3">
                    <label for="partyName" class="form-label">Party Name</label>
                    <input type="text" class="form-control" id="partyName" name="partyName" placeholder="Enter Party Name" required>
                </div>
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </div>
            </form>
            <!-- Message Div -->
            <div id="msg" class="text-center mt-3"></div>
        </div>
    </div>
</div>

<div class="container text-center mt-5">
        <a href="admin_dashboard.php" class="btn btn-primary mb-2" >Admin Dashboard</a>
        <a href="deleteCandidate.php" class="btn btn-danger mb-2" >Delete Candidate</a>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#partyAdd").submit(function(e) {
        e.preventDefault();
        $("#msg").text(""); // Clear previous messages
        let pname = $("#partyName").val();
        console.log("Submitting party name:", pname);

        $.ajax({
            url: "chek_party.php",
            method: "POST",
            data: { "pname": pname },
            success: function(response) {
               console.log("Server response:", response);
                try {
                    let data = JSON.parse(response);
                    $("#msg").text(data.message).css("color", data.status === "success" ? "green" : "red");
                } catch (error) {
                    $("#msg").text("Failed to register. Please try again later.").css("color", "red");
                }
            },
            error: function() {
                $("#msg").text("Failed to connect. Please try again later.").css("color", "red");
            }
        });
    });
</script>

<?php
require_once "footer.php";
?>