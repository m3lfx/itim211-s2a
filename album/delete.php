<?php
include('../includes/config.php');
$album_id = $_GET['id'];
$sql = "DELETE FROM albums WHERE album_id = $album_id";
// echo $sql;
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: index.php");
}
