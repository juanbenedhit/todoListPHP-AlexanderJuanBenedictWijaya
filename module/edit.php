<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['users'][$_GET['id']])) {
    $todo = $_SESSION['users'][$_GET['id']];
} else {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];

    $_SESSION['users'][$id] = [
        'listToDo' => $_POST['listToDo'],
        'date' => $_POST['date'],
        'priority' => $_POST['priority']
    ];

    $_SESSION['message'] = 'To-do updated successfully!';
    $_SESSION['type'] = 'success';
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit To-Do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="listToDo" class="form-label">Edit the task</label>
                        <input type="text" class="form-control" name="listToDo" value="<?= $todo['listToDo'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Edit due date</label>
                        <input type="date" class="form-control" name="date" value="<?= $todo['date'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select name="priority" id="priority" class="form-select">
                            <option value="low" <?= $todo['priority'] == 'low' ? 'selected' : '' ?>>low</option>
                            <option value="mid" <?= $todo['priority'] == 'mid' ? 'selected' : '' ?>>mid</option>
                            <option value="high" <?= $todo['priority'] == 'high' ? 'selected' : '' ?>>high</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
