<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/admin/styles.css" rel="stylesheet" />
    <link href="../../css/admin/add.css" rel="stylesheet" />
    <title>Chỉnh sửa thông tin người dùng</title>
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
                    <li class="breadcrumb-item active">Người dùng</li>
                    <li class="breadcrumb-item active">Chỉnh sửa thông tin người dùng</li>
                </ol>
                <hr />
                <section id="content" class="container">
                    <form method="post"
                        action="index.php?act=admin&&ad=user&&action=edit&&id=<?php echo $rs["user_id"]; ?>">
                        <h1 class="heading">Form nhập thông tin người dùng</h1>
                        <p>Vui lòng nhập thông tin để sửa thông tin người dùng.</p>
                        <hr>
                        <?php if (isset($message) && ($message != "")) {
                            if ($message == "success") {
                                echo "<p class = 'success'>Sửa thông tin thành công..</p>";
                            } else {
                                echo "<p class = 'error'>Lỗi...</p>";
                            }
                        }
                        ?>
                        <label for="name"><b>Tên đăng nhập</b></label>
                        <input type="text" value="<?php echo $rs["user_name"]; ?>" name="username" disabled>
                        <label for="singer"><b>Mật khẩu</b></label>
                        <input type="password" value="<?php echo $rs["password"]; ?>" name="password" required
                            autofocus>
                        <label for="genre"><b>Email</b></label>
                        <input type="email" name="email" value="<?php echo $rs["email"]; ?>">
                        <div class="clearfix">
                            <input type="submit" name="edit" value="Sửa" class="btnAdd"></input>
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