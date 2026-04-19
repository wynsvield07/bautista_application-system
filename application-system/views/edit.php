<?php
require_once '../config/database.php';
require_once '../models/Applicant.php';

$applicant = new Applicant($conn);
$data = $applicant->getById($_GET['id']);

if($_POST){
    $applicant->update($_GET['id'], [
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['password'],
        $_POST['specialization'],
        $_POST['experience_level'],
        $_POST['certification']
    ]);
    header("Location: index.php");
}
?>

<form method="POST">
<input type="text" name="first_name" value="<?= $data['first_name'] ?>"><br>
<input type="text" name="last_name" value="<?= $data['last_name'] ?>"><br>
<input type="text" name="email" value="<?= $data['email'] ?>"><br>
<input type="text" name="password" value="<?= $data['password'] ?>"><br>
<button type="submit">Update</button>
</form>