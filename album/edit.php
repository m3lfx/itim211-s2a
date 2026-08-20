<?php
include('../includes/header.php');
include('../includes/config.php');
$album_id =  $_GET['id'];



//album details
$album_query = "SELECT al.album_id, al.album_name, al.genre, al.date_released, ar.artist_id, ar.artist_name FROM albums al INNER JOIN artists ar ON ar.artist_id = al.artist_id WHERE album_id = {$album_id}";
echo $album_query;
$album_result = mysqli_query($conn, $album_query);
$album = mysqli_fetch_assoc($album_result);

//drop down select
$artist_query = "SELECT artist_id, artist_name  FROM artists WHERE artist_id <> {$album['artist_id']} ORDER BY artist_name DESC";
$artist_result = mysqli_query($conn, $artist_query);
?>

<body>
    <div class="container">
        <form method="POST" action="update.php">
            <div class="form-group">
                <label for="name">Album Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter artist name" name="album_name"
                    value="<?php echo $album['album_name']; ?>">

                <label for="genre">Genre</label>

                <input type="text" class="form-control" id="genre" placeholder="Enter album genre" name="genre"
                    value="<?php echo $album['genre']; ?>">

                <label for="date_released">date released</label>

                <input type="date" class="form-control" id="date_released" placeholder="Enter album date"
                    name="date_released" value="<?php echo $album['date_released']; ?>">

                <label for="artists">artists</label>

                <select name="artist_id" id="artists" class="form-control">

                    <?php
                    echo "<option value={$album['artist_id']} selected>{$album['artist_name']}</option>";
                    while ($row = mysqli_fetch_assoc($artist_result)) {
                        echo "<option value={$row['artist_id']}>{$row['artist_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="album_id" class="form-control" value="<?php echo $album['album_id'];
                                                                                ?>" />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>