<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/admin/styles.css" rel="stylesheet" />
    <link href="../../css/admin/add.css" rel="stylesheet" />
    <title>Thêm thể loại</title>
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
                    <li class="breadcrumb-item active">Thêm thể loại</li>
                </ol>
                <hr />
                <section id="content" class="container">
                    <form method="post" action="index.php?act=admin&&ad=genre&&action=add"
                        enctype="multipart/form-data">
                        <h1 class="heading">Form nhập thông tin thể loại</h1>
                        <p>Vui lòng nhập thông tin để thêm thông tin thể loại.</p>
                        <hr>
                        <?php if (isset($message) && ($message != "")) {
                            if ($message == "success") {
                                echo "<p class = 'success'>Thêm mới thành công..</p>";
                            } else {
                                echo "<p class = 'error'>Lỗi...</p>";
                            }
                        }
                        ?>
                        <label for="name"><b>Tên thể loại</b></label>
                        <input type="text" placeholder="Nhập tên thể loại" name="name" required autofocus>

                        <label for="image"><b>Hình ảnh</b></label>
                        <input type="file" name="image" placeholder="Please choose image for song" accept="image/*">

                        <div class="clearfix">
                            <input type="submit" name="add" value="Thêm" class="btnAdd"></input>
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