<?php
session_start();
include('../includes/config.php');
if (! isset($_SESSION['email'])) {
    header("Location: ../users/login.php");
}
// var_dump($_POST);
$album = mysqli_real_escape_string($conn, trim($_POST['album_name']));
$genre = trim($_POST['genre']);
$date_released = $_POST['date_released'];
$artist_id = trim($_POST['artist_id']);
$query = "INSERT INTO albums(album_name, genre, date_released, artist_id) VALUES('{$album}', '{$genre}', '{$date_released}', $artist_id)";
print $query;
$result = mysqli_query($conn, $query);
if ($result > 0) {
    header("Location: index.php");
} else
    echo mysqli_error($conn);
