<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php?act=admin">Zing mp3</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-auto float-right me-lg-4">
        <li class="nav-item dropdown" style="display: flex">
            <p class="nav-link">ADMIN</p>
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php?act=logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">core</div>
                    <a class="nav-link" href="index.php?act=admin">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Trang chủ
                    </a>

                    <a class="nav-link" href="index.php?act=admin&&ad=song">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-music"></i>
                        </div>
                        Bài hát
                    </a>
                    <a class="nav-link" href="index.php?act=admin&&ad=user">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-sharp fa-solid fa-user"></i>
                        </div>
                        Người dùng
                    </a>
                    <a class="nav-link" href="index.php?act=admin&&ad=genre">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        Thể loại
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Zing mp3
            </div>
        </nav>
    </div>