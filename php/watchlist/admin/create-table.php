<?php defined('_WL') or die;

    require_once '../config.php';
	require_once '../connection.php';

    // Create table
    try {
        $sql = 'CREATE TABLE IF NOT EXISTS test (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        text TEXT,
        date DATE NOT NULL
        ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $output = 'Error creating test table: ' . $e->getMessage();
        include '../output.html.php';
        exit();
    }
    $output = 'Test table successfully created or already exists.';
    include '../output.html.php';
?>
