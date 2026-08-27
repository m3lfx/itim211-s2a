<?php
session_start();
include("../includes/header.php");
require("../includes/config.php");


$album_sql = "SELECT * FROM albums";
$albums = mysqli_query($conn, $album_sql);
?>
<div class="container-fluid container-lg">
    <form action="create_albums.php" method="POST">
        <?php
        if (mysqli_num_rows($albums) > 0) {

            while ($row = mysqli_fetch_assoc($albums)) {

                echo "<div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='{$row['album_id']}' id='flexCheckDefault' name='albums[]'>
                    <label class='form-check-label' for='flexCheckDefault'>
                        {$row['album_name']}
                    </label>
                    </div>";
            }
        }

        ?>
        <button type="submit" class="btn btn-primary">update list</button>
    </form>
</div>
<?php
include("../includes/footer.php");
