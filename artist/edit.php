<?php
include('../includes/header.php');
include('../includes/config.php');
$artist_id =  $_GET['id'];
$sql = "SELECT * FROM artists WHERE artist_id = {$artist_id} LIMIT 1";
// echo $sql;
$result = mysqli_query($conn, $sql);
$artist = mysqli_fetch_assoc($result);
// var_dump($artist);
?>


<form action="update.php" method="POST">
    <p>artist name: <input type="text" name="artist_name" class="form-control" value="<?php echo $artist['artist_name'];
                                                                                        ?>" /></p>
    <p>country<input type="text" name="country" class="form-control" value="<?php echo $artist['country'];
                                                                            ?>" /></p>


    <input type="hidden" name="artist_id" class="form-control" value="<?php echo $artist['artist_id'];
                                                                        ?>" />
    <p><input type="submit" value="update" class="btn btn-primary" /><a href="index.php" class="btn btn-light btn-lg "
            role="button" aria-disabled="true">Cancel</a></p>

</form>
</div>
</body>

</html>