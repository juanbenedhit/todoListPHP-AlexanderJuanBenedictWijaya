<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
<header class="bg-primary py-4">
    <h1 class="text-white m-0 px-4 fw-bold">Todo list</h1>
</header>

<div class="container text-center mt-5">
    <h3 class="fw-bold">Tambahkan yang harus dilakukan</h3>
</div>
    <div class="container mt-4">
    <!-- alert php -->
        <?php if (isset($_SESSION['message']))  : ?>
                <div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible fade show"  role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    <?php
                        unset($_SESSION['message']);
                        unset($_SESSION['type']);
                    ?>
                <?php endif ?>

    <!-- alert php -->

        <div class="card">
                <div class="card-body">
                <form method="POST" action="module/input.php">
                    <div class="mb-3">
                        <label for="listToDo" class="form-label ">Masukkan hal yang akan dilakukan</label>
                        <input type="text" class="form-control" name="listToDo" require>
                    </div>
                    <div class="mb-3">
                    <label for="date" class="form-label">Masukkan tanggal harus selesai</label>
                    <input type="date" class="form-control" name="date" required />
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Priority</label>
                        <select name="priority" id="priority"  class="form-select">
                            <option value="low">low</option>
                            <option value="mid">mid</option>
                            <option value="high">high</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
                </form>
            </div>
        </div>

    </div>
    
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@ LIST YANG SUDAH MASUK  @@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- <div class="container mt-5" id ="list">
    <div class="card">
        <div class="card-header bg-warning ">
            <h4 class="m-0 fw-bold">
            Yang harus dilakukan
            </h4>
        </div>
        <div class="card-body "> -->
            <?php
                if (isset($_SESSION['users']) && !empty($_SESSION['users'])) { 
                    echo '<div class="container mt-5" id ="list">';
                        echo '<div class="card">';
                            echo '<div class="card-header bg-warning ">';
                                echo '<h4 class="m-0 fw-bold">Yang harus dilakukan</h4>';
                            echo '</div>';
                            echo '<div class="card-body ">    ';       
                                foreach ($_SESSION['users'] as $id => $user) {
                                    echo '<div class="outer shadow p-3 mb-4 bg-body-tertiary rounded">';
                                        echo '<div class="inner d-flex justify-content-between">'; 
                                            echo '<div class="d-column" style="width: 75%;">'; 
                                                echo '<h4>' . $user['listToDo'] . '</h4>';
                                                echo '<p class="mb-2">' . $user['date'] . '</p>';
                                                switch ($user['priority']) {
                                                    case 'low':
                                                        echo '<span class="badge bg-primary m-0">' . $user['priority'] . '</span>';
                                                        break;
                                                    case 'mid':
                                                        echo '<span class="badge bg-warning">' . $user['priority'] . '</span>';
                                                        break;
                                                    case 'high':
                                                        echo '<span class="badge bg-danger">' . $user['priority'] . '</span>';
                                                        break;
                                                } 
                                            echo '</div>'; 
                                            echo '<div class="button-container d-flex align-items-center">'; 
                                                echo '<a href="module/edit.php?id=' . $id . '"><button class="custom-btn-edit"></button></a>';
                                                echo '<a href="module/complete.php?id=' . $id . '"><button class="custom-btn-check"></button></a>';
                                            echo '</div>'; 
                                        echo '</div>'; 
                                    echo '</div>'; 
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';  
                }
            ?>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@ LIST YANG SUDAH SELESAI  @@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <?php
                if (isset($_SESSION['completed']) && !empty($_SESSION['completed'])) {

                    echo '<div class="container mt-5" id="complete">';
                        echo '<div class="card">';
                            echo'<div class="card-header bg-success">';
                                echo '<h4 class="m-0 fw-bold text-white">Yang sudah dilakukan</h4>';
                            echo '</div>';
                            echo '<div class="card-body">';
                                foreach ($_SESSION['completed'] as $id => $completed) {  
                                    echo '<div class="outer shadow p-3 mb-4 bg-body-tertiary rounded">';
                                        echo '<div class="d-flex justify-content-between">';
                                            echo '<div class="d-column" style="width: 75%;">';
                                                echo '<h4>' . $completed['listToDo'] . '</h4>';
                                                echo '<p class="mb-2">' . $completed['date'] . '</p>';
                                                switch ($completed['priority']) {
                                                    case 'low':
                                                        echo '<span class="badge bg-primary m-0">' . $completed['priority'] . '</span>';
                                                        break;
                                                    case 'mid':
                                                        echo '<span class="badge bg-warning">' . $completed['priority'] . '</span>';
                                                        break;
                                                    case 'high':
                                                        echo '<span class="badge bg-danger">' . $completed['priority'] . '</span>';
                                                        break;
                                                }
                                            echo '</div>';
                                            echo '<div class="button-container d-flex align-items-center">'; 
                                                echo '<a href="module/delete.php?id=' . $id . '"><button class="custom-btn-delete"></button></a>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';       
                }
            ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>