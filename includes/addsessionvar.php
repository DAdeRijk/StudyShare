<?php
    header('Content-Type: application/json');
    $data = file_get_contents('php://input');
    $data = json_decode($data);

    session_start();

    $_SESSION[$data->key] = $data->value;

    echo json_encode($data);
    exit();
?>