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
                    <li class="breadcrumb-item active">Thể loại</li>
                </ol>
                <hr />
                <a href="index.php?act=admin&&ad=genre&&action=add" class="btn btn-primary btn-sm"
                    style="margin-bottom: 20px;">Add</a>

                <table border="1">
                    <tr>
                        <th>Mã thể loại</th>
                        <th>Tên thể loại</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>

                    <?php
                    $list_genre = getAllGenre();
                    while ($row = mysqli_fetch_array($list_genre)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['genre_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <img src="<?php echo $row["image_url"]; ?>" style="width: 80px; height: 80px;"
                                    class="img-fluid rounded-top" alt="">
                            </td>

                            <td>
                                <a href="index.php?act=admin&&ad=genre&&action=edit&&id=<?php echo $row["genre_id"]; ?>"><i
                                        class="fa-solid fa-pencil"></i></a> |
                                <a href="index.php?act=admin&&ad=genre&&action=delete&&id=<?php echo $row["genre_id"]; ?>"
                                    onclick="if(!(confirm('Are you sure you want to delete this genre?'))) return false"><i
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