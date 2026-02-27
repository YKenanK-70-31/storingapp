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
                <input type="text" name="attractie" id="attractie" class="form-input">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <!-- hier komt een dropdown -->
                 <form method="POST" action="meldingenController.php">

  <input type="text" name="attractie" placeholder="Attractie" required>

  <input type="text" name="capaciteit" placeholder="Capaciteit" required>

  <input type="text" name="melder" placeholder="Melder" required>

  <select name="type" required>
    <option value="">-- Kies type --</option>
    <option value="Technisch">Technisch</option>
    <option value="Veiligheid">Veiligheid</option>
    <option value="Overig">Overig</option>
  </select>

  <label>
    <input type="checkbox" name="prioriteit" value="1"> Prioriteit
  </label>

  <textarea name="overige_info" placeholder="Overige info"></textarea>

  <button type="submit">Opslaan</button>

</form>
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input">
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>
