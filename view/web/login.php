<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../assets/img/title.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <style>
        .footer {
            margin-top: 24px;
        }

        .container {
            height: 75vh;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <main class="container">
        <form action="index.php?act=login" method="post" class="form-login">
            <h2>Đăng nhập</h2>
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
            <input type="password" placeholder="*******" name="password">

            <input type="submit" name="login" value="Đăng nhập">
        </form>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>