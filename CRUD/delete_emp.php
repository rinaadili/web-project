<?php
    require '../database/mysql.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "DELETE FROM aboutusemp WHERE id= " . $id;
    $query = $conn->prepare($query);

    $query->execute();


    header("Location: about.php");