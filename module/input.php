<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $listToDo = $_POST['listToDo'];
    $date = $_POST['date'];
    $priority = $_POST['priority'];
    $dateTime = DateTime::createFromFormat('Y-m-d', $date);
}

$user = [
    'listToDo' => $listToDo,
    'date' => $date,
    'priority' => $priority
];

if ($dateTime && $dateTime->format('Y-m-d') === $date) {
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    $_SESSION['users'][] = $user;
    $_SESSION['message'] = "Pendaftaran Berhasil";
    $_SESSION['type'] = "success";
} else  {
    $_SESSION['message'] = "Pendaftaran gagal, tanggal tidak valid";
    $_SESSION['type'] = "danger";
}

header("Location: ../index.php");
exit;
?>
