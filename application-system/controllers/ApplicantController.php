<?php
require_once '../config/database.php';
require_once '../models/Applicant.php';

$database = new PDO("mysql:host=localhost;dbname=application_system", "root", "");
$applicant = new Applicant($database);

$action = $_GET['action'] ?? '';

if ($action == "create") {
    $data = [
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['password'],
        $_POST['specialization'],
        $_POST['experience_level'],
        $_POST['certification']
    ];
    $applicant->create($data);
    header("Location: ../views/index.php");
}

if ($action == "delete") {
    $applicant->delete($_GET['id']);
    header("Location: ../views/index.php");
}
?>