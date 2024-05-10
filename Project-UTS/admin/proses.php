<?php
require_once 'koneksi.php';
if (!isset($_POST['submit'])) {
}
if ($_POST['submit'] == 'login') {
    $username = $_POST['username'];

    $query = "SELECT * FROM users WHERE username=?";
    $user = $dbh->prepare($query);
    $user->execute([$username]);
    $count = $user->rowCount();
    $user = $user->fetch();
    if ($count > 0) {
        if (password_verify($_POST['password'], $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            header('location: dashboard.php');
        } else {
            header('location: login.php');
        }
    } else {
        header('location: login.php');
    }
} else {
    session_start();
    session_destroy();
    header('location: index.html');
}
