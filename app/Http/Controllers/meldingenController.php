<?php

// Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];

// 1. Verbinding
require_once "conn.php"; // Zorg dat hier $pdo staat (PDO-object)

// 2. Query
$query = "INSERT INTO meldingen (attractie, type) VALUES (:attractie, :type)";

// 3. Prepare
$statement = $pdo->prepare($query);

// 4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type
]);

$items = $statement->fetchAll(PDO::FETCH_ASSOC);

?>