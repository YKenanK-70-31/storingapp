<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: http://storingapp.test/resources/views/login/index.php");
    exit;
}
?>
<?php require_once __DIR__.'/../../../config/config.php'; ?>

<!doctype html>
<html lang="nl">
<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>
<body>
    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">

            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" required>
            </div>

            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" required>
            </div>

            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" id="type" required>
                    <option value="">-- Kies type --</option>
                    <option value="Technisch">Technisch</option>
                    <option value="Veiligheid">Veiligheid</option>
                    <option value="Overig">Overig</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="prioriteit" value="1"> Prioriteit
                </label>
            </div>

            <div class="form-group">
                <label for="overige_info">Overige info:</label>
                <textarea name="overige_info" id="overige_info"></textarea>
            </div>

            <button type="submit">Opslaan</button>

        </form>
    </div>
</body>
</html>