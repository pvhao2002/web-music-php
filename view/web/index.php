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
    <link rel="stylesheet" href="../../css/song.list.css">

    <!-- TEST -->
    <script src="https://kit.fontawesome.com/7d35781f0a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- END TEST -->
    <!-- Using Bootstrap Icons v1.3.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include("header.php"); ?>

    <main class="home-section">
        <!-- Thể loại -->
        <div class="box-left">
            <div class="genre">
                <h1 class="heading">thể loại</h1>

                <div class="list-genre">
                    <?php
                    $list_genre = getAllGenre();
                    while ($row = mysqli_fetch_array($list_genre)) {
                        ?>
                        <a class="genre-card" href="index.php?act=list-song&&genre_id=<?php echo $row["genre_id"]; ?>">
                            <div class="bg-action">
                                <img src="../../assets/img/play1.png" class="icon-play" alt="">
                            </div>
                            <div class="avatar">
                                <img src="<?php echo $row["image_url"]; ?>" class="genre-img" alt="">
                                <p class="genre-name">
                                    <?php echo $row["name"]; ?>
                                </p>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="song-list">
                <a href="index.php?act=list-song">
                    <h1 class="heading song" style="margin-top: 10px;">bài hát</h1>
                </a>
                <div class="song-group">
                    <?php
                    $top10 = top10();
                    while ($row = mysqli_fetch_array($top10)) {
                        ?>
                        <div class="song-item">
                            <hr>
                            <div class="song-item-main">
                                <img src="<?php echo $row["image_url"]; ?>" alt="" class="song-item-img" />
                                <div class="song-item-info">
                                    <a href="index.php?act=song&&id=<?php echo $row["song_id"]; ?>"
                                        class="song-item-name"><?php echo $row["title"]; ?></a>
                                    <p class="song-item-artist">
                                        <?php echo $row["artist"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="box-right">
            <h1 class="heading">BXH bài hát</h1>
            <div class="bxh">
                <?php $top5 = top5();
                $index = 1;
                while ($row = mysqli_fetch_array($top5)) {
                    if ($index < 4) {
                        ?>
                        <div class="bxh-item">
                            <p class="stt top<?php echo $index; ?>"><?php echo $index; ?></p>
                            <div class="item-info">
                                <a href="index.php?act=song&&id=<?php echo $row["song_id"]; ?>" class="title">
                                    <?php echo $row["title"]; ?>
                                </a>
                                <p class="artist">
                                    <?php echo $row["artist"]; ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                    <?php } else { ?>
                        <div class="bxh-item">
                            <p class="stt">
                                <?php echo $index; ?>
                            </p>
                            <div class="item-info">
                                <a href="index.php?act=song&&id=<?php echo $row["song_id"]; ?>" class="title">
                                    <?php echo $row["title"]; ?>
                                </a>
                                <p class="artist">
                                    <?php echo $row["artist"]; ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                    <?php }
                    $index++;
                } ?>
            </div>
        </div>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>