<?php
include('../includes/config.php');
print_r($_POST);
$name = trim($_POST['artist_name']);
$country = trim($_POST['country']);

$sql = "INSERT INTO artists (artist_name, country) VALUES('{$name}', '{$country}')";
echo $sql;
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: index.php");
}
// print_r($_GET);