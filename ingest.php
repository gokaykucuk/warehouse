<?php
    $file_name = $_SERVER["HTTP_WAREHOUSE_KEY"];
    $file = "$file_name.csv";
    $data = json_decode(file_get_contents('php://input'), true);
    $data_to_write = implode(",",array_values($data)) . "\n";
    file_put_contents($file, $data_to_write, FILE_APPEND);
?>