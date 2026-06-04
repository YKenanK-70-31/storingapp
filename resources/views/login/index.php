<?php require_once __DIR__ . '/../components/head.php'; ?>
<?php require_once __DIR__ . '/../components/header.php'; ?>

<main>
    <div class="container">
        <h1>Inloggen</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">
            <label>Gebruikersnaam</label>
            <input type="text" name="username" required>

            <label>Wachtwoord</label>
            <input type="password" name="password" required>

            <button type="submit">Inloggen</button>
        </form>
    </div>
</main>