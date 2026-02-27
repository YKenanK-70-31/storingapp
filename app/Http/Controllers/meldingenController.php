<?php

$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0;
$overige_info = $_POST['overige_info'] ?? '';

if (empty($attractie) || empty($type) || empty($melder)) {
    die("Attractie, Type en Melder mogen niet leeg zijn.");
}


if (!is_numeric($capaciteit)) {
    die("Capaciteit moet een getal zijn.");
}
require_once "../../../config/conn.php";

$query = "INSERT INTO meldingen 
(attractie, capaciteit, melder, type, prioriteit, overige_info)
VALUES (:attractie, :capaciteit, :melder, :type, :prioriteit, :overige_info)";

$statement = $conn->prepare($query);

$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":type" => $type,
    ":prioriteit" => $prioriteit,
    ":overige_info" => $overige_info
]);

echo "Formulier succesvol opgeslagen!";

?>