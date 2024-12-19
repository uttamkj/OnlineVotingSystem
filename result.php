<?php
 require_once "navbar.php";
?>

<?php
include_once "functions.php";
$result  = getParties();

?>

<div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Party Name</th>
                    <th>Vote Count </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="align-middle"><?php echo $row['party_name']; ?></td>
                        <td class="align-middle"><?php echo $row['vote_count']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>
</div>

<?php
 require_once "footer.php";
?>