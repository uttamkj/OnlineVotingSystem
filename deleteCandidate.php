<?php
require_once "navbar.php"
?>

<?php
require_once "functions.php";
$result = getParties();
if($result){
?>
<div class="container">
<table class="table table-light table-striped">
    <thead>
        <tr>
            <th>Name</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
     <?php
        while($party = $result->fetch_assoc()){
            ?>
                <tr>
                    <!-- <td><?php echo $party['id'] ?></td> -->
                    <td><?php echo $party['party_name'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="delete_party.php?id=<?php echo $party['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php
        }
     ?>
     <!-- </pre> -->
    </tbody>
</table>
<div class="text-center">
    <a href="admin_dashboard.php" class=" btn btn-info">Admin Dashboard</a>
</div>
</div>
<?php
} else {
    echo "<h1>No Data Found</h1>";
}

?>

<?php
require_once "footer.php"
?>