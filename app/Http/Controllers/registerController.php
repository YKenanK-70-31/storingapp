<?php
session_start();
require_once __DIR__ . '/../../../config/conn.php';

$email = $_POST['email'];
$password = $_POST['password'];
$password_check = $_POST['password_check'];

// Check of wachtwoord niet leeg is
if(empty($password)) {
    die("Error: wachtwoord mag niet leeg zijn!");
}

// Check of wachtwoorden overeenkomen
if($password !== $password_check) {
    die("Error: wachtwoorden komen niet overeen!");
}

// Hash het wachtwoord
$hash = password_hash($password, PASSWORD_DEFAULT);

// Voeg gebruiker toe aan database
$query = "INSERT INTO users (username, password) VALUES (:email, :hash)";
$statement = $conn->prepare($query);
$statement->execute([':email' => $email, ':hash' => $hash]);

// Stuur naar loginpagina
header("Location: http://storingapp.test/resources/views/login/index.php");
exit;