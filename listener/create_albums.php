<?php
// var_dump($_POST);
session_start();
var_dump($_SESSION);
include("../includes/header.php");
include("../includes/config.php");

$listener_sql = "SELECT listener_id FROM listeners WHERE user_id = {$_SESSION['user_id']} LIMIT 1";
var_dump($listener_sql);
$result = mysqli_query($conn, $listener_sql);
$row = mysqli_fetch_assoc($result);
$listener_id = (int)$row['listener_id'];
var_dump($listener_id);
if (isset($_POST['albums'])) {
    $album_ids = $_POST['albums'];
    var_dump($album_ids);
    foreach ($album_ids as $album_id) {
        // echo $album_id;

        $sql1 = "INSERT INTO album_listener (listener_id, album_id) VALUES($listener_id, $album_id )";
        $result = mysqli_query($conn, $sql1);
    }
    // unset($_POST);
    $_POST['albums'] = array();
    header("Location: index.php");
}
