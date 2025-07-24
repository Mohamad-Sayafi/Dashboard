<?php
require_once '../loader.php';
session_start();
$action = $_POST['action'];

if ($action == 'register') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed = md5($confirm_password);

    if (empty($email)) {
        $result = [
            'failed' => 'Inter your email'
        ];
    }

    if (empty($password) || empty($confirm_password)) {
        $result = [
            'failed' => 'Inter and confirm your password.'
        ];
    }

    if ($password !== $confirm_password) {
        $result = [
            'failed' => 'password is incorrect'
        ];
    } else {
        $user_data = [
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => $hashed
        ];

        $result = db_insert('user', $user_data);

        if ($result) {
            $connection = db_connection();
            $user_id = mysqli_insert_id($connection);

            $_SESSION['user_id'] = $user_id;
            $result = [
                'success' => 'you registerd successfully.'
            ];
        } else {
            echo "register failed.";
        }
    }
    echo json_encode($result);
    exit;
} elseif ($action == 'login') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $result = [
            'failed' => 'Please fill in both email and password.'
        ];
    }

    $sql = "SELECT *FROM `user` WHERE `user_email`='$email'";
    $user = db_select_one($sql);

    if (!$user) {
        $result = [
            'failed' => 'Invalid email or password.'
        ];
    } elseif (md5($password) == $user['user_password']) {
        $_SESSION['user_id'] = $user['user_id'];
        $result = [
            'success' => 'you logined'
        ];
    } else {
        $result = [
            'failed' => 'email ro password is wrong.'
        ];
    }

    echo json_encode($result);
    exit;
} elseif ($action == 'change_info') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed = md5($confirm_password);

    if (empty($email)) {
        $result = [
            'failed' => 'Inter your email'
        ];
    }

    if (empty($password) || empty($confirm_password)) {
        $result = [
            'failed' => 'Inter and confirm your password.'
        ];
    }

    if ($password !== $confirm_password) {
        $result = [
            'failed' => 'password is incorrect'
        ];
    } else {
        $user_id = $_SESSION['user_id'];

        $sql = "UPDATE `user` SET `user_name`='$name',`user_email`='$email',`user_password`='$hashed' WHERE `user_id`= $user_id";
        $output = mysqli_query(db_connection(), $sql);

        $result = [
            'success' => 'your data changed.'
        ];
        echo json_encode($result);
        exit;
    }
}
