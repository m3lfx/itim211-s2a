<?php
include("../includes/config.php");

$email = mysqli_escape_string($conn, trim($_POST['email']));
$password = mysqli_escape_string($conn, $_POST['password']);
$password = password_hash($password, PASSWORD_BCRYPT);
// var_dump($password);
$sql = "INSERT INTO users (email, password, status, created_at) VALUES('{$email}', '{$password}', 'active', now())";
// var_dump($sql);
$result = mysqli_query($conn, $sql);
if ($result) {

    // header("Location: ../listener/create.php");
}
