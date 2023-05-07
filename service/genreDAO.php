<?php
function countGenre()
{
    include("config.php");
    $sql = "SELECT * FROM genres";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    mysqli_close($link);
    return $count;
}
function getAllGenre()
{
    include("config.php");
    $query = "SELECT * FROM genres";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return $result;
    }
    return NULL;
}

function addGenre($genre_name, $image_url)
{
    include("config.php");
    $query = "INSERT INTO genres(name, image_url) VALUES(N'" . $genre_name . "', N'" . $image_url . "')";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function updateGenre($id, $genre_name, $image_url)
{
    include("config.php");
    $query = "UPDATE genres SET name = N'" . $genre_name . "', image_url = N'" . $image_url . "' WHERE genre_id = " . $id;
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function deleteGenre($id)
{
    include("config.php");
    $query = "DELETE FROM genres WHERE genre_id = " . $id;
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function getGenre($id)
{
    include("config.php");
    $query = "SELECT * FROM genres WHERE genre_id =" . $id;
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
?>