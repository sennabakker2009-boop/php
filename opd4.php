<?php
$resultaat = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aantal = filter_input(INPUT_POST, 'aantal', FILTER_VALIDATE_INT);

    if ($aantal === false || $aantal === null || $aantal < 1 || $aantal > 10) {
        $resultaat = 'Voer een geheel getal van 1 t/m 10 in.';
    } else {
        $over = 10 - $aantal;

        if ($aantal === 1) {
            $gegooidWoord = 'knikker';
        } else {
            $gegooidWoord = 'knikkers';
        }

        if ($over === 1) {
            $overWoord = 'knikker';
        } else {
            $overWoord = 'knikkers';
        }

        $resultaat = "Je gooit $aantal $gegooidWoord op. Er blijven $over $overWoord over.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Knikkers</title>
</head>
<body>
    <h1>Knikkers</h1>
    <p>Er zitten 10 knikkers in de zak.</p>

    <form method="post">
        <label for="aantal">Opgegooid aantal:</label>
        <input type="number" id="aantal" name="aantal" min="1" max="10" step="1" required>
        <button type="submit">Bereken</button>
    </form>

<?php
if ($resultaat !== '') {
    echo '<p>' . htmlspecialchars($resultaat, ENT_QUOTES, 'UTF-8') . '</p>';
}
?>
</html>