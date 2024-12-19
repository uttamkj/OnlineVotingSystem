<?php
    if(!isset($_GET['id'])){
        header("location:display.php");
    }
    $id = $_GET['id'];
    require_once "functions.php";
    $res = deletePartyById($id);
    if($res){
    ?>
    <script>
        alert("Party deleted");
        window.location = "deleteCandidate.php";
    </script>
    <?php
    } else {
        ?>
        <script>
            alert("Invalid ID");
            window.location = "deleteCandidate.php";
        </script>
        <?php
    }
?>