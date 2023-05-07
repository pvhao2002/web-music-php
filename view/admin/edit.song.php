<?php
include("service/genreDAO.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/admin/styles.css" rel="stylesheet" />
    <link href="../../css/admin/add.css" rel="stylesheet" />
    <title>Chỉnh sửa thông tin bài hát</title>
    <style>
        .success {
            color: white;
            background-color: lightgreen;
        }

        .error {
            color: white;
            background-color: lightcoral;
        }
    </style>
    <!-- Ids in the navbar a-href and ids in the content should match-->
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Trang chủ</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Trang chủ</li>
                    <li class="breadcrumb-item active">Bài hát</li>
                    <li class="breadcrumb-item active">Chỉnh sửa thông tin bài hát</li>
                </ol>
                <hr />
                <section id="content" class="container">
                    <form method="post"
                        action="index.php?act=admin&&ad=song&&action=edit&&id=<?php echo $rs["song_id"]; ?>"
                        enctype="multipart/form-data">
                        <h1 class="heading">Form nhập thông tin bài hát</h1>
                        <p>Vui lòng nhập thông tin để sửa thông tin bài hát.</p>
                        <hr>
                        <?php if (isset($message) && ($message != "")) {
                            if ($message == "success") {
                                echo "<p class = 'success'>Chỉnh sửa thành công..</p>";
                            } else {
                                echo "<p class = 'error'>Lỗi...</p>";
                            }
                        }
                        ?>
                        <label for="name"><b>Tên bài hát</b></label>
                        <input type="text" value="<?php echo $rs["title"]; ?>" name="title" required autofocus>
                        <label for="singer"><b>Ca sĩ</b></label>
                        <input type="text" value="<?php echo $rs["artist"]; ?>" name="artist" required>
                        <label for="genre"><b>Thể loại</b></label>
                        <select name="genre_id">
                            <?php
                            $list_genre = getAllGenre();
                            while ($row = mysqli_fetch_array($list_genre)) {
                                echo '<option value="' . $row["genre_id"] . '">' . $row["name"] . '</option>';
                            }
                            ?>
                        </select>

                        <label for="image"><b>Hình ảnh</b></label>
                        <input type="file" name="image" value="<?php echo $rs["image_url"]; ?>" accept="image/*">
                        <label for="Audio"><b>Âm thanh</b></label>
                        <input type="file" name="audio" value="<?php echo $rs["audio_url"]; ?>" accept=".mp3,audio/*">
                        <label for="rate"><b>Đánh giá</b></label>
                        <input type="number" min="0" max="5" value="<?php echo $rs["rating"]; ?>" name="rate" required>

                        <label for="lyric"><b>Lời nhạc</b></label>
                        <textarea rows="4" placeholder="Type lyric of song"
                            name="lyric"><?php echo $rs["lyric"]; ?></textarea>
                        <div class="clearfix">
                            <input type="submit" name="edit" value="Chỉnh sửa" class="btnAdd"></input>
                        </div>
                    </form>
                </section>
            </div>
        </main>
        <?php
        include("footer.php");
        ?>
    </div>
    </div>
</body>

</html>