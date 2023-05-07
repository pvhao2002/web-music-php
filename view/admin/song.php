<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ADMIN</title>
    <link href="../../css/admin/styles.css" rel="stylesheet" />
    <link href="../../css/admin/index.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon"
        href="https://upload.wikimedia.org/wikipedia/commons/1/19/Logo-ute_%282%29.png" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
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
                </ol>
                <hr />
                <a href="index.php?act=admin&&ad=song&&action=add" class="btn btn-primary btn-sm"
                    style="margin-bottom: 20px;">Add</a>

                <table border="1">
                    <tr>
                        <th style="width: 10%;">Mã bài hát</th>
                        <th style="width: 10%;">Tên bài hát</th>
                        <th style="width: 10%;">Ca sĩ</th>
                        <th style="width: 10%;;">Mã thể loại</th>
                        <th style="width: 20%;">Nhạc</th>
                        <th style="width: 20%;">Hình ảnh</th>
                        <th style="width: 6%;">Đánh giá</th>
                        <th style="width: 14%;">Thao tác</th>
                    </tr>

                    <?php
                    $list_song = getAllSong();
                    while ($row = mysqli_fetch_array($list_song)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['song_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['artist']; ?>
                            </td>
                            <td>
                                <?php echo $row['genre_id']; ?>
                            </td>
                            <td>
                                <audio controls class="item-audio">
                                    <source src="<?php echo $row['audio_url']; ?>" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            </td>
                            <td>
                                <img src="<?php echo $row["image_url"]; ?>" style="width: 80px; height: 80px;"
                                    class="img-fluid rounded-top" alt="">
                            </td>
                            <td>
                                <?php echo $row["rating"]; ?> <i class="fa-solid fa-star"></i>
                            </td>
                            <td>
                                <a href="index.php?act=admin&&ad=song&&action=edit&&id=<?php echo $row["song_id"]; ?>"><i
                                        class="fa-solid fa-pencil"></i></a> |
                                <a href="index.php?act=admin&&ad=song&&action=delete&&id=<?php echo $row["song_id"]; ?>"
                                    onclick="if(!(confirm('Are you sure you want to delete this song?'))) return false"><i
                                        class="fa-solid fa-trash" style="color: red;"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            </div>
        </main>
        <?php
        include("footer.php");
        ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>