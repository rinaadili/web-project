<?php
    require '../database/mysql.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "DELETE FROM user WHERE id= " . $id;
    $query = $conn->prepare($query);

    $query->execute();


    header("Location: users.php");
    ?>