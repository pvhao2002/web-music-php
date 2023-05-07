<header>
    <nav>
        <div class="logo"><a href="index.php">Zing mp3</a></div>
        <div class="btnSearch">
            <form action="index.php?act=list-song&&search" method="post">
                <input type="text" name="find" placeholder="Enter the name of the song you want to listen">
                <input type="submit" name="lookup" value="..." style="display: none;">
            </form>
            <i class="bi bi-search"></i>
        </div>
        <?php
        if (!isset($_SESSION['user'])) {
            ?>
            <div class="btn">
                <a href="index.php?act=login" class="btnLogin">Login</a>
                <a href="index.php?act=signup" class="btnSignup">Sign up</a>
            </div>
        <?php } else { ?>
            <div class='username'>
                <a href="index.php?act=profile"><i class='bi bi-person'></i></a>
                <a href='index.php?act=logout' class="logout">Logout</a>
            </div>
        <?php } ?>
    </nav>
    <hr>
</header>
<div id="banner">
</div>
<hr>