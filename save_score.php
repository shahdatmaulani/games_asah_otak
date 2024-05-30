<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $score = intval($_POST['score']);

    $stmt = $mysqli->prepare("INSERT INTO point_game (nama_user, total_point) VALUES (?, ?)");

    if ($stmt) {
        $stmt->bind_param("si", $name, $score);

        if ($stmt->execute()) {
            echo "Data tersimpan!";
        } else {
            echo "Gagal menyimpan data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mempersiapkan statement: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
