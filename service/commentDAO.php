<?php
function countComment()
{
    include("config.php");
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    mysqli_close($link);
    return $count;
}

function getAllCommentBySong($song_id)
{
    include("config.php");
    $sql = "SELECT * FROM comments WHERE song_id = " . $song_id . " ORDER BY created_at DESC";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    return $result;
}

function addComment($song_id, $user_id, $text_comment)
{
    include("config.php");
    $sql = "INSERT INTO comments(song_id, user_id, comment_text, created_at) VALUES(" . $song_id . ", " . $user_id . ", N'" . $text_comment . "', NOW())";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    return $result;
}
?>