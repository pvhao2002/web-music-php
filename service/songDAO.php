<?php
function countSong()
{
    include("config.php");
    $sql = "SELECT * FROM songs";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        $count = mysqli_num_rows($result);
        mysqli_close($link);
        return $count;
    }
    return 0;
}

function getAllSong()
{
    include("config.php");
    $query = "SELECT * FROM songs";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}
function getAllSongByGenre($genre_id)
{
    include("config.php");
    $query = "SELECT * FROM songs WHERE genre_id = " . $genre_id;
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}


function addSong($title, $artist, $genre_id, $image_url, $audio_url, $rate, $lyric)
{
    include("config.php");
    $query = "INSERT INTO songs(title, artist, genre_id, audio_url, image_url, rating, lyric)
    VALUES(N'" . $title . "', N'" . $artist . "', " . $genre_id . ", N'" . $audio_url . "', N'" . $image_url . "', " . $rate . ", N'" . $lyric . "')";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function updateSong($id, $title, $artist, $genre_id, $image_url, $audio_url, $rate, $lyric)
{
    include("config.php");
    $query = "UPDATE songs SET title = N'" . $title . "', artist = N'" . $artist . "', genre_id = " . $genre_id . ",
    audio_url = N'" . $audio_url . "', image_url = N'" . $image_url . "', rating = " . $rate . ", lyric = N'" . $lyric . "'
    WHERE song_id = " . $id;
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}


function deleteSong($id)
{
    include("config.php");
    $query = "DELETE FROM songs WHERE song_id = " . $id;
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function getSong($id)
{
    include("config.php");
    $query = "SELECT * FROM songs WHERE song_id = " . $id;
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if ($row > 0) {
            return $row;
        }
    }
    return null;
}

function top5()
{
    include("config.php");
    $query = "SELECT * FROM songs WHERE rating = 5 ORDER BY song_id DESC LIMIT 5";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function top10()
{
    include("config.php");
    $query = "SELECT * FROM songs ORDER BY song_id DESC LIMIT 10";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function searchByName($name)
{
    include("config.php");
    $sql = "SELECT * FROM songs WHERE title like '%" . $name . "%'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return $result;
    }
    return null;
}


?>