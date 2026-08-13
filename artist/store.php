<?php
include('../includes/config.php');
print_r($_POST);
print_r($_FILES);
$name = trim($_POST['artist_name']);
$country = trim($_POST['country']);

$sql = "INSERT INTO artists (artist_name, country) VALUES('{$name}', '{$country}')";
echo $sql;
if (isset($_FILES['img_path'])) {
    if ($_FILES['img_path']['type'] == "image/jpeg" || $_FILES['img_path']['type'] == "image/jpg" || $_FILES['img_path']['type'] == "image/png") {
        $source = $_FILES['img_path']['tmp_name'];
        $target = "../upload/" . $_FILES['img_path']['name'];
        move_uploaded_file($source, $target) or die("Couldn't copy");
    } else {
        print "wrong file type";
    }
} else {
    print "no file uploaded";
}

$sql = "INSERT INTO artists (artist_name, country, img_path) VALUES('{$name}', '{$country}', '{$target}' )";
echo $sql;
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: index.php");
}
// print_r($_GET);