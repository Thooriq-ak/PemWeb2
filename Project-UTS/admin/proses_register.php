<?php
session_start();
include "koneksi.php"; 

if(isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['password_confirmation'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if ($password !== $password_confirmation) {
        $_SESSION['error'] = 'Password confirmation does not match.';
        header("Location: register.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        $_SESSION['error'] = 'Username already exists.';
        header("Location: register.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$name, $username, $hashed_password]);
    
    $_SESSION['message'] = 'Registration successful. Please login with your username and password.';
    header("Location: register.php");
    exit();
} else {
    $_SESSION['error'] = 'All fields are required.';
    header("Location: register.php");
    exit();
}
?>
