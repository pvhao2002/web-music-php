<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/admin/styles.css" rel="stylesheet" />
    <link href="../../css/admin/add.css" rel="stylesheet" />
    <title>Chỉnh sửa thể loại</title>
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
                    <li class="breadcrumb-item active">Thể loại</li>
                    <li class="breadcrumb-item active">Chỉnh sửa thông tin thể loại</li>
                </ol>
                <hr />
                <section id="content" class="container">
                    <form method="post"
                        action="index.php?act=admin&&ad=genre&&action=edit&&id=<?php echo $rs["genre_id"]; ?>"
                        enctype="multipart/form-data">
                        <h1 class="heading">Form nhập thông tin thể loại</h1>
                        <p>Vui lòng nhập thông tin để sửa thông tin thể loại.</p>
                        <hr>
                        <?php if (isset($message) && ($message != "")) {
                            if ($message == "success") {
                                echo "<p class = 'success'>Chỉnh sửa thành công..</p>";
                            } else {
                                echo "<p class = 'error'>Lỗi...</p>";
                            }
                        }
                        ?>
                        <label for="name"><b>Tên thể loại</b></label>
                        <input type="text" value="<?php echo $rs["name"]; ?>" name="name" required autofocus>

                        <label for="image"><b>Hình ảnh</b></label>
                        <input type="file" name="image" value="<?php echo $rs["image_url"]; ?>" accept="image/*">

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