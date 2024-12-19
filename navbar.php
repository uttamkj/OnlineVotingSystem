<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
    <title>E-Voting System Navbar</title>
    <script src="./bootstrap/jquery-3.7.1.js"></script>
</head>

<body>
    <?php 
        // echo $_SESSION['name'] ;
        // if($_SESSION['name'] == 'admin')
        if(isset(($_SESSION['email']))){
            ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">E-Voting System</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="candidate_dashboard.php">Dashboard</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="candidate.php">Candidates</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="result.php">Results</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            
                            <a class="btn btn-primary me-1" href="password.php">Change Password</a>
                            <a class="btn btn-primary" href="logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <?php  
        }
        else{
            ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">E-Voting System</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="candidate.php">Candidates</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="result.php">Results</a>
                            </li> -->
                        </ul>
                        <div class="d-flex">
                            <!-- Dropdown for Login -->
                            <div class="dropdown me-2 ms-4">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                                    <li><a class="dropdown-item" href="admin_login.php">Admin Login</a></li>
                                    <li><a class="dropdown-item" href="login.php">Voter Login</a></li>
                                </ul>
                            </div>
                            <!-- <button class="btn btn-primary" type="button">Register</button> -->
                            <!-- <a class="btn btn-primary me-1" href="login.php">login</a> -->
                            <a class="btn btn-primary" href="register.php">Register</a>
                        </div>
                    </div>
                </div>
            </nav>
            <?php
        }
    ?>