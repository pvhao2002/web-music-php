<?php
session_start();
ob_start();
include("service/userDAO.php");
include("service/songDAO.php");
include("service/genreDAO.php");
include("service/commentDAO.php");
include("service/playlistDAO.php");


if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login': {
                if ((isset($_POST['login'])) && ($_POST['login'])) {
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    if (strcmp($username, "") === 0 && strcmp($pass, "") === 0) {
                        $error = "Vui lòng nhập đầy đủ thông tin";
                    } else {
                        $user = checkLogin($username, $pass);
                        if ($user === NULL) {
                            $error = "Tên đăng nhập hoặc mật khẩu không đúng";
                        } else {
                            $user = mysqli_fetch_array($user);
                            if ($user["role_id"] == 1) {
                                $_SESSION["admin"] = $user;
                                header('location: index?act=admin');
                            } else {
                                $_SESSION["user"] = $user;
                                header('location: index.php');
                            }
                        }
                    }
                }
                include("view/web/login.php");
                break;
            }
        case 'signup': {
                if ((isset($_POST['signup'])) && ($_POST['signup'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirm = $_POST['confirm'];
                    $email = $_POST['email'];
                    if (
                        strcmp($username, '') == 0 &&
                        strcmp(
                            $password,
                            ''
                        ) == 0 &&
                        strcmp($confirm, '') == 0
                    ) {
                        $error = "Vui lòng nhập đầy đủ thông tin.";
                    } else {
                        if (strcmp($password, $confirm) != 0) {
                            $error = "Xác nhận mật khẩu không khớp.";
                        } else {
                            include("service/userDAO.php");
                            $checkDuplicate = checkDuplicateUsername($username);
                            if ($checkDuplicate) {
                                $error = "Tên đăng nhập đã tồn tại.";
                            } else {
                                signUp($username, $password, $email);
                                header('location: index.php?act=login');
                            }
                        }
                    }
                }
                include("view/web/signup.php");
                break;
            }
        case 'logout': {
                if (isset($_SESSION["user"])) {
                    unset($_SESSION["user"]);
                }
                if (isset($_SESSION["admin"])) {
                    unset($_SESSION["admin"]);
                }
                header('location: index.php');
                break;
            }
        case 'admin': {
                if (isset($_SESSION['admin'])) {
                    if (isset($_GET["ad"])) {
                        switch ($_GET['ad']) {
                            case 'song': {
                                    if (isset($_GET['action'])) {
                                        switch ($_GET['action']) {
                                            case 'add': {
                                                    if (isset($_POST['add']) && ($_POST['add'])) {
                                                        $title = $_POST["title"];
                                                        $artist = $_POST["artist"];
                                                        $genre_id = $_POST["genre_id"];
                                                        $target_dir_img = "assets/img/";
                                                        $target_dir_song = "assets/song/";
                                                        $image = $target_dir_img . basename($_FILES["image"]["name"]);
                                                        $audio = $target_dir_song . basename($_FILES["audio"]["name"]);
                                                        $rate = $_POST["rate"];
                                                        $lyric = $_POST['lyric'];
                                                        $rs = addSong($title, $artist, $genre_id, $image, $audio, $rate, $lyric);
                                                        if ($rs) {
                                                            $message = "success";
                                                        } else {
                                                            $message = "error";
                                                        }
                                                    }
                                                    include("view/admin/add.song.php");
                                                    break;
                                                }
                                            case 'edit': {
                                                    if (isset($_GET['id']) && ($_GET['id'] != "")) {
                                                        $id = $_GET['id'];
                                                        if (isset($_POST['edit']) && ($_POST['edit'])) {
                                                            $title = $_POST["title"];
                                                            $artist = $_POST["artist"];
                                                            $genre_id = $_POST["genre_id"];
                                                            $target_dir_img = "assets/img/";
                                                            $target_dir_song = "assets/song/";
                                                            $image = $target_dir_img . basename($_FILES["image"]["name"]);
                                                            $audio = $target_dir_song . basename($_FILES["audio"]["name"]);
                                                            $rate = $_POST["rate"];
                                                            $lyric = $_POST['lyric'];
                                                            updateSong($id, $title, $artist, $genre_id, $image, $audio, $rate, $lyric);
                                                            header("location: index.php?act=admin&&ad=song");
                                                        } else {
                                                            $rs = getSong($id);
                                                        }
                                                        include("view/admin/edit.song.php");
                                                    } else {
                                                        include("view/admin/song.php");
                                                    }
                                                    break;
                                                }
                                            case 'delete': {
                                                    if (isset($_GET['id']) && ($_GET['id'] != "")) {
                                                        $id = $_GET['id'];
                                                        if (!deleteSong($id)) {
                                                            echo "<script>alert('Không thể xóa được!')</script>";
                                                        }
                                                    }
                                                    include("view/admin/song.php");
                                                    break;
                                                }
                                            default:
                                                include("view/admin/song.php");
                                                break;
                                        }
                                    } else {
                                        include("view/admin/song.php");

                                    }
                                    break;
                                }
                            case 'user': {
                                    if (isset($_GET['action'])) {
                                        switch ($_GET['action']) {
                                            case 'add': {
                                                    if (isset($_POST['add']) && ($_POST['add'])) {
                                                        $username = $_POST["username"];
                                                        $password = $_POST["password"];
                                                        $email = $_POST["email"];
                                                        if (!checkDuplicateUsername($username)) {
                                                            $rs = signUp($username, $password, $email);
                                                            $message = "success";
                                                        } else {
                                                            $message = "error";
                                                            $mess = "Tên đăng nhập đã tồn tại";
                                                        }
                                                    }
                                                    include("view/admin/add.user.php");
                                                    break;
                                                }
                                            case 'edit': {
                                                    if (isset($_GET['id']) && ($_GET['id'] != "")) {
                                                        $id = $_GET['id'];
                                                        if (isset($_POST['edit']) && ($_POST['edit'])) {
                                                            $username = $_POST["username"];
                                                            $password = $_POST["password"];
                                                            $email = $_POST["email"];
                                                            updateUser($id, $username, $password, $email);
                                                            header("location: index.php?act=admin&&ad=user");
                                                        } else {
                                                            $rs = getUser($id);
                                                        }
                                                        include("view/admin/edit.user.php");
                                                    } else {
                                                        include("view/admin/user.php");
                                                    }
                                                    break;
                                                }
                                            case 'delete': {
                                                    if (isset($_GET['id']) && ($_GET['id'] != "")) {
                                                        $id = $_GET['id'];
                                                        if (!deleteUser($id)) {
                                                            echo "<script>alert('Không thể xóa được!')</script>";
                                                        }
                                                    }
                                                    include("view/admin/user.php");
                                                    break;
                                                }
                                            default:
                                                include("view/admin/user.php");
                                                break;
                                        }
                                    } else {
                                        include("view/admin/user.php");
                                    }
                                    break;
                                }
                            case 'genre': {
                                    if (isset($_GET['action'])) {
                                        switch ($_GET['action']) {
                                            case 'add': {
                                                    if (isset($_POST['add']) && ($_POST['add'])) {
                                                        $genre_name = $_POST["name"];
                                                        $target_dir_img = "assets/img/";
                                                        $image = $target_dir_img . basename($_FILES["image"]["name"]);
                                                        $rs = addGenre($genre_name, $image);
                                                        if ($rs) {
                                                            $message = "success";
                                                        } else {
                                                            $message = "error";
                                                        }
                                                    }
                                                    include("view/admin/add.genre.php");
                                                    break;
                                                }
                                            case 'edit': {
                                                    if (isset($_GET['id']) && ($_GET['id'] != "")) {
                                                        $id = $_GET['id'];
                                                        if (isset($_POST['edit']) && ($_POST['edit'])) {
                                                            $genre_name = $_POST["name"];
                                                            $target_dir_img = "assets/img/";
                                                            $image = $target_dir_img . basename($_FILES["image"]["name"]);
                                                            updateGenre($id, $genre_name, $image);
                                                            header("location: index.php?act=admin&&ad=genre");
                                                        } else {
                                                            $rs = getGenre($id);
                                                        }
                                                        include("view/admin/edit.genre.php");
                                                    } else {
                                                        include("view/admin/genre.php");
                                                    }
                                                    break;
                                                }
                                            case 'delete': {
                                                    if (isset($_GET['id']) && ($_GET['id'] != "")) {
                                                        $id = $_GET['id'];
                                                        if (!deleteGenre($id)) {
                                                            echo "<script>alert('Không thể xóa được!')</script>";
                                                        }
                                                    }
                                                    include("view/admin/genre.php");
                                                    break;
                                                }
                                            default:
                                                include("view/admin/genre.php");
                                                break;
                                        }
                                    } else {
                                        include("view/admin/genre.php");
                                    }
                                    break;
                                }
                            case 'comment': {

                                    break;
                                }

                            case 'playlist': {


                                    break;
                                }


                            default:
                                include('view/admin/index.php');
                                break;
                        }
                    } else {
                        include('view/admin/index.php');
                    }
                } else {
                    include('view/web/login.php');
                }
                break;
            }

        case 'list-song': {
                if (isset($_GET["search"]) && isset($_POST['lookup'])) {
                    $genre_name = "Bài hát tìm kiếm";
                    $title = $_POST["find"];
                    $list_song = searchByName($title);
                } else {
                    if (isset($_GET["genre_id"]) && $_GET["genre_id"]) {
                        $genre_id = $_GET["genre_id"];
                        $genre_name = getGenre($genre_id)["name"];
                        $list_song = getAllSongByGenre($genre_id);
                    } else {
                        $genre_name = "Tất cả";
                        $list_song = getAllSong();
                    }
                }
                include("view/web/list.song.php");
                break;
            }
        case 'song': {
                if (isset($_GET["id"])) {
                    $song_item = getSong($_GET["id"]);
                    include("view/web/song.info.php");
                } else {
                    include("view/web/index.php");
                }
                break;
            }
        case 'comment': {
                if (isset($_POST['post-comment']) && $_POST['post-comment'] && isset($_GET["song_id"])) {
                    $comment = $_POST["comment"];
                    $user_id = $_SESSION["user"]["user_id"];
                    $song_id = $_GET["song_id"];
                    addComment($song_id, $user_id, $comment);
                }
                header('location: index.php?act=song&&id=' . $_GET["song_id"]);
                break;
            }
        case 'play-list': {
                if (isset($_SESSION["user"])) {
                    if (isset($_GET["playlist-id"]) && isset($_GET["song-id"])) {
                        $playlist_id = $_GET["playlist-id"];
                        $song_id = $_GET["song-id"];
                        addSong2Playlist($playlist_id, $song_id);
                    }
                    $genre_name = "Tất cả";
                    $list_song = getAllSong();
                    include("view/web/list.song.php");
                } else {
                    include("view/web/login.php");
                }
                break;
            }
        case 'add-playlist': {
                if (isset($_POST["add"]) && $_POST["add"]) {
                    $playlist_name = $_POST["playlist-name"];
                    $user_id = $_SESSION["user"]["user_id"];
                    addPlaylist($playlist_name, $user_id);
                }
                header('location: index.php?act=list-song');
                break;
            }
        default:
            if (isset($_SESSION['ad'])) {
                unset($_SESSION['ad']);
            }
            include("view/web/index.php");
            break;
    }
} else {

    include("view/web/index.php");
}
?>