<?php
require_once '../config/database.php';
require_once '../models/Applicant.php';

$applicant = new Applicant($conn);
$results = $applicant->getAll();
?>

<a href="create.php">Add Applicant</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

<?php while($row = $results->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= $row['applicant_id'] ?></td>
    <td><?= $row['first_name'] . " " . $row['last_name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['applicant_id'] ?>">Edit</a>
        <a href="../controllers/ApplicantController.php?action=delete&id=<?= $row['applicant_id'] ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>