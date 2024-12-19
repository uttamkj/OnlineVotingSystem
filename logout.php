<?php
include_once "navbar.php";
session_destroy();
header("location:login.php");
?>