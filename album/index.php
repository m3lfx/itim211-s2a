<?php
include('../includes/header.php');
include('../includes/config.php');
include('../includes/alert.php');
?>

<body>
    <?php
    $query = "SELECT al.album_id, al.album_name, ar.artist_name, al.genre, al.date_released FROM albums al INNER JOIN artists ar ON ar.artist_id = al.artist_id ORDER BY album_id DESC";
    $result = mysqli_query($conn, $query);
    ?>
    <a href="create.php" class="btn btn-primary btn-lg " role="button" aria-disabled="true">add album</a></p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="id">Id</th>
                <th scope="name">Album name</th>
                <th>Artist name</th>
                <th>genre</th>
                <th>date released</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<th scope='row'>{$row['album_id']}</th>";
                echo "<td>{$row['album_name']}</td>";
                echo "<td>{$row['artist_name']}</td>";
                echo "<td>{$row['genre']}</td>";
                echo "<td>{$row['date_released']}</td>";
                echo "<td><a href='edit.php?id={$row['album_id']}'><i class=\"fa-solid fa-pencil\" color='blue'></i></a><a href='delete.php?id={$row['album_id']}'><i class=\"fa-solid fa-trash\" style='color: red'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>