<?php require_once __DIR__.'/../../../config/conn.php'; ?>

<?php
// SELECT-query uitvoeren   
$query = "SELECT * FROM meldingen";
$statement = $conn->prepare($query);
$statement->execute();
$meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #d3d3d3;
            padding: 8px;
            text-align: left;
        }
        td {
            padding: 8px;
        }
        tr:nth-child(odd) {
            background-color: #ebebeb;
        }
        tr:hover {
            background-color: #d3d3d3;
        }
    </style>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg'])): ?>
            <div class='msg'><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

            
        <div class="meldingen-overzicht">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Attractie</th>
                    <th>Capaciteit</th>
                    <th>Melder</th>
                    <th>Type</th>
                    <th>Prioriteit</th>
                    <th>Overige info</th>
                </tr>
                <?php foreach ($meldingen as $melding): ?>
                <tr>
                    <td><?php echo htmlspecialchars($melding['id']); ?></td>
                    <td><?php echo htmlspecialchars($melding['attractie']); ?></td>
                    <td><?php echo htmlspecialchars($melding['capaciteit']); ?></td>
                    <td><?php echo htmlspecialchars($melding['melder']); ?></td>
                    <td><?php echo htmlspecialchars($melding['type']); ?></td>
                    <td><?php echo $melding['prioriteit'] ? 'Ja' : 'Nee'; ?></td>
                    <td><?php echo htmlspecialchars($melding['overige_info']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>

</body>

</html>