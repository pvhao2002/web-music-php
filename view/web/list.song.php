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
    <link rel="stylesheet" href="../../css/home.list.song.css">
    <!-- TEST -->
    <script src="https://kit.fontawesome.com/7d35781f0a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- END TEST -->
    <!-- Using Bootstrap Icons v1.3.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include("header.php"); ?>

    <main class="home-list-song">
        <?php
        while ($row = mysqli_fetch_array($list_song)) {
            ?>
            <div class="song-item">
                <div class="song-item-1">
                    <img src="../../assets/img/music.svg" alt="">
                    <img src="<?php echo $row["image_url"]; ?>" style="width: 100px; height: 80px;" class="song-item-img"
                        alt="">
                    <div class="song-item-info">
                        <p class="song-item-name">
                            <?php echo $row["title"]; ?>
                        </p>
                        <p class="song-item-artist">
                            <?php echo $row["artist"]; ?>
                        </p>
                    </div>
                </div>

                <div class="song-item-2">
                    <audio controls class="item-audio">
                        <source src="<?php echo $row["audio_url"]; ?>" type="audio/mpeg">
                        Your browser does not support the audio tag.
                    </audio>
                </div>
                <div class="song-item-3">
                    <img src="../../assets/img/share-nodes-solid.svg" alt="">
                    <img src="../../assets/img/download-solid.svg" data-src="<?php echo $row["audio_url"]; ?>"
                        onclick="downloadd(this);" alt="">
                    <img src="../../assets/img/heart-regular.svg" alt="">
                </div>
            </div>
            <hr />
        <?php } ?>
    </main>

    <?php include("footer.php"); ?>


    <script>
        // function to download if client user cliced icon download in list song
        function downloadd(iDownload) {
            let url = iDownload.getAttribute('data-src')
            // reference at stackoverflow: https://stackoverflow.com/questions/25755096/div-click-download-audio-file
            var link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', url);
            document.getElementsByTagName("body")[0].appendChild(link);
            // Firefox
            if (document.createEvent) {
                var event = document.createEvent("MouseEvents");
                event.initEvent("click", true, true);
                link.dispatchEvent(event);
            }
            // IE
            else if (link.click) {
                link.click();
            }
            link.parentNode.removeChild(link);
        }
    </script>
</body>

</html>