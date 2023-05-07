<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../assets/img/title.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <style>
        .footer {
            margin-top: 24px;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>
    <main class="container">
        <form action="index.php?act=signup" method="post" class="form-login">
            <h2>Đăng ký</h2>
            <hr>
            <?php
            if (isset($error) && ($error != "")) {
                echo '<p class="login-error">' . $error . '</p>';
            }
            ?>
            <br />
            <label for="username">Tên đăng nhập *</label>
            <input type="text" placeholder="Nhập tên đăng nhập" name="username">
            <label for="password">Mật khẩu *</label>
            <input type="password" placeholder="******" name="password">
            <label for="confirm">Xác nhận mật khẩu *</label>
            <input type="password" placeholder="******" name="confirm">
            <label for="email">Email</label>
            <input type="text" placeholder="Nhập email" name="email">

            <input type="submit" name="signup" value="Đăng ký">
        </form>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>