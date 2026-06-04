<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: http://storingapp.test/resources/views/login/index.php");
    exit;
}

require_once __DIR__ . '/../../../config/conn.php';

$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0;
$overige_info = $_POST['overige_info'];

$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overige_info) VALUES (?, ?, ?, ?, ?, ?)";
$statement = $conn->prepare($query);
$statement->execute([$attractie, $capaciteit, $melder, $type, $prioriteit, $overige_info]);

header("Location: http://storingapp.test/resources/views/meldingen/index.php?msg=Melding aangemaakt!");
exit;