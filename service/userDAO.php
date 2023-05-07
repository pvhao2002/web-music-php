<?php
function checkDuplicateUsername($username)
{
    include("config.php");
    $sql = "SELECT * FROM users where user_name = '" . $username . "'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    mysqli_close($link);
    return $count > 0;
}

function getAllUser()
{
    include("config.php");
    $query = "SELECT * FROM users WHERE role_id = 2";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function getUser($id)
{
    include("config.php");
    $query = "SELECT * FROM users WHERE user_id = " . $id;
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if ($row > 0) {
            return $row;
        }
    }
    return null;
}

function deleteUser($id)
{
    include("config.php");
    $query = "DELETE FROM users WHERE user_id = " . $id;
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function signUp($username, $password, $email)
{
    include("config.php");
    $sql = "INSERT INTO users(user_name, password, email, role_id) VALUES (N'" . $username . "', N'" . $password . "', N'" . $email . "' , 2)";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    return $result;
}

function updateUser($id, $username, $password, $email)
{
    include("config.php");
    $query = "UPDATE users SET password = N'" . $password . "', email = N'" . $email . "' WHERE user_id = " . $id;
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}
function checkLogin($userName, $password)
{
    include("config.php");
    $query = "SELECT * FROM users WHERE user_name = '" . $userName . "' and password = '" . $password . "'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return $result;
    }
    return NULL;
}
function countUser()
{
    include("config.php");
    $sql = "SELECT * FROM users";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        mysqli_close($link);
        return $count;
    }
    return 0;
}

?>