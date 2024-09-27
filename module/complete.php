<?php
session_start();

if(isset($_GET['id']) && isset($_SESSION['users'][$_GET['id']])) {
    $completeTask = $_SESSION['users'][$_GET['id']];

    if(!isset($_SESSION['completed'])) {
        $_SESSION['completed'] = [];
    }

    $_SESSION['completed'][] = $completeTask;
    unset($_SESSION['users'][$_GET['id']]);

    $_SESSION['message'] = 'Task Sudah Selesai!';
    $_SESSION['type'] = 'success';
}

header('Location: ../index.php');
exit();

?>
