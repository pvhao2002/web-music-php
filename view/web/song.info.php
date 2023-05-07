<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../assets/img/title.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/home.info.song.css">
    <!-- TEST -->
    <script src="https://kit.fontawesome.com/7d35781f0a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- END TEST -->
    <!-- Using Bootstrap Icons v1.3.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include("header.php"); ?>

    <main class="home-info-song">
        <div class="song-image">
            <img src="<?php echo $song_item["image_url"]; ?>" alt="">
        </div>
        <div class="song-info">
            <img src="../../assets/img/share-nodes-solid.svg" class="icon-share" alt="">
            <div class="info">
                <h6 class="title">
                    <?php echo $song_item["title"]; ?>
                </h6>
                <p class="artist">
                    <?php echo $song_item["artist"]; ?>
                </p>
            </div>
            <img src="../../assets/img/heart-regular.svg" alt="">
        </div>
        <div class="src-audio">
            <audio class="item-src" controls>
                <source src="<?php echo $song_item["audio_url"]; ?>" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>
        </div>
        <div class="lyric-song">
            <h2>Lời nhạc:</h2>
            <pre>
                <?php echo $song_item["lyric"]; ?>
            </pre>
        </div>
        <?php if (isset($_SESSION["user"])) { ?>
            <div class="comment">
                <h1 class="heading">
                    bình luận
                </h1>
                <div class="textbox-comment">
                    <form action="index.php?act=comment&&song_id=<?php echo $song_item["song_id"]; ?>" method="post"
                        class="form-comment">
                        <textarea class="form-control" name="comment" id="" rows="4"></textarea>
                        <div class="submit-comment">
                            <input type="submit" value="Bình luận" class="btn-post-comment" name="post-comment">
                        </div>
                    </form>
                </div>
            </div>

            <div class="song-comment">
                <?php
                $song_id = $song_item["song_id"];
                $list_comment = getAllCommentBySong($song_id);
                while ($row = mysqli_fetch_array($list_comment)) {
                    ?>
                    <div class="song-comment-item">
                        <h4 class="username-comment">
                            <?php
                            $u = getUser($row["user_id"]);
                            echo $u["user_name"];
                            ?>
                        </h4>
                        <p class="text-comment">
                            <?php echo $row["comment_text"]; ?>
                        </p>
                        <p class="time-comment">
                            <?php echo $row["created_at"]; ?>
                        </p>
                    </div>
                    <hr>
                <?php }
        } ?>
        </div>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>