<?php require_once __DIR__.'/config/config.php'; ?>

<!doctype html>
<html lang="nl">
<head>
    <title>StoringApp / Registreren</title>
    <?php require_once __DIR__.'/resources/views/components/head.php'; ?>
</head>
<body>
    <?php require_once __DIR__.'/resources/views/components/header.php'; ?>

    <div class="container">
        <h1>Registreren</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/registerController.php" method="POST">

            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_check">Wachtwoord herhalen:</label>
                <input type="password" name="password_check" id="password_check" required>
            </div>

            <button type="submit">Registreren</button>

        </form>
    </div>
</body>
</html>