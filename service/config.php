<?php
$link = mysqli_connect('localhost', 'root', '', 'mp3');
if ($link === false) {
    die("ERROR: Could not connect" . mysqli_connect_error());
}
?>
