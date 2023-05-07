<?php
function countPlaylist()
{
    include("config.php");
    $sql = "SELECT * FROM playlists";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    mysqli_close($link);
    return $count;
}
?>