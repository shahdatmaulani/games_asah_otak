<?php
require_once 'connection.php';

$result = mysqli_query($mysqli, "SELECT * FROM master_kata");

if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$json_data = json_encode($data);

mysqli_close($mysqli);
?>
