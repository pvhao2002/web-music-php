<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>ADMIN - ABC GROUP</title>
  <link href="../../css/admin/styles.css" rel="stylesheet" />
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
        <hr />
      </div>
      <div class="row mx-5">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Bài hát</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div class="small text-white">Total number:
                <?php
                echo countSong(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Người dùng</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div class="small text-white">Total number:
                <?php echo countUser(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Thể loại</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div class="small text-white">Total number:
                <?php echo countGenre(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Bình luận</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div class="small text-white">Total number:
                <?php echo countComment(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Danh sách phát</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div class="small text-white">Total number:
                <?php echo countPlaylist(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="../../js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>