<?php
session_start();

if(isset($_GET['id']) && isset($_SESSION['completed'][$_GET['id']])) {
    unset($_SESSION['completed'][$_GET['id']]);

    $_SESSION['message'] = 'Task Berhasil Dihapus!';
    $_SESSION['type'] = 'success';
}

header('Location: ../index.php');
exit();

?>
