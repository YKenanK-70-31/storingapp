<?php

// Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$melder = $_POST['melder']; // melder ophalen uit het formulier

// Verbinding
require_once "../../../config/conn.php";

// Query met melder erbij
$query = "INSERT INTO meldingen (attractie, type, melder) 
          VALUES (:attractie, :type, :melder)";

// Prepare
$statement = $conn->prepare($query);

// Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":melder" => $melder
]);

?>