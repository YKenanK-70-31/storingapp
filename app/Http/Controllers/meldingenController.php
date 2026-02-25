<?php
// 1. Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0;
$overige_info = $_POST['overige_info'];

// 2. Verbinding maken (PDO)
require_once "conn.php"; // Hier moet $pdo = new PDO(...) staan

// 3. Query voorbereiden
$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overige_info)
          VALUES (:attractie, :capaciteit, :melder, :type, :prioriteit, :overige_info)";

// 4. Prepare
$statement = $pdo->prepare($query);

// 5. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":type" => $type,
    ":prioriteit" => $prioriteit,
    ":overige_info" => $overige_info
]);

// 6. Klaar
echo "Formulier succesvol opgeslagen!";
?>