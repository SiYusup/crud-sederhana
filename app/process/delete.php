<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $username = "app_user";
    $password = "app_password";
    $serverName = "dockerdbhost";
    $database = "my_database";

    $connection = new mysqli($serverName, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection Error : " . $connection->connect_error);
    }

    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header('location: ../view/index.php');
exit;
