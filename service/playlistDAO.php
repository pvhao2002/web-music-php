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

function getAllPlaylist($user_id)
{
    include("config.php");
    $query = "SELECT * FROM playlists WHERE user_id = " . $user_id;
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return $result;
    }
    return NULL;
}

function addPlaylist($playlist_name, $user_id)
{
    include("config.php");
    $query = "INSERT INTO playlists (user_id, name) VALUES (" . $user_id . ", '" . $playlist_name . "')";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function addSong2PlayList($playlist_id, $song_id)
{
    include("config.php");
    $query = "INSERT INTO playlist_songs (playlist_id, song_id) VALUES (" . $playlist_id . ", " . $song_id . ")";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function getLastPlaylistByUser($user_id)
{
    include("config.php");
    $query = "SELECT * FROM playlists WHERE user_id = " . $user_id . " ORDER BY playlist_id DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if ($row > 0) {
            return $row;
        }
    }
    return NULL;
}

?>