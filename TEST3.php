<?php
include "connessione.php";

/* Funzione per messaggi */
function messaggio($testo, $ok = true) {
    $colore = $ok ? "green" : "red";
    echo "<p style='color:$colore'><strong>$testo</strong></p>";
}

/* =========================
   INSERIMENTO FARMACO
   ========================= */
if (isset($_POST['ins_farmaco'])) {
    $stmt = $conn->prepare("
        INSERT INTO farmaco 
        (NOME_FARMACO, CATEGORIA_TERAPEUTICA, DESCRIZIONE, TOTALE_FARMACI)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "sssi",
        $_POST['nome_farmaco'],
        $_POST['categoria'],
        $_POST['descrizione_farmaco'],
        $_POST['totale_farmaci']
    );

    $stmt->execute()
        ? messaggio("Farmaco inserito correttamente")
        : messaggio("Errore inserimento farmaco", false);
}

/* =========================
   INSERIMENTO PRINCIPIO ATTIVO
   ========================= */
if (isset($_POST['ins_pa'])) {
    $stmt = $conn->prepare("
        INSERT INTO principio_attivo (NOME_PRINCIPIO, DESCRIZIONE)
        VALUES (?, ?)
    ");
    $stmt->bind_param("ss", $_POST['nome_pa'], $_POST['descrizione_pa']);

    $stmt->execute()
        ? messaggio("Principio attivo inserito correttamente")
        : messaggio("Errore inserimento principio attivo", false);
}

/* =========================
   INSERIMENTO INTERAZIONE
   ========================= */
if (isset($_POST['ins_interazione'])) {
    $a = $_POST['fa'];
    $b = $_POST['fb'];

    if ($a != $b) {
        if ($a > $b) [$a, $b] = [$b, $a];

        $stmt = $conn->prepare("
            INSERT INTO interazione
            (ID_FARMACO_A, ID_FARMACO_B, DESCRIZIONE_INTERAZIONE, LIVELLO_GRAVITA)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "iiss",
            $a,
            $b,
            $_POST['descrizione_interazione'],
            $_POST['gravita']
        );

        $stmt->execute()
            ? messaggio("Interazione inserita correttamente")
            : messaggio("Errore inserimento interazione", false);
    } else {
        messaggio("Selezionare due farmaci diversi", false);
    }
}

/* =========================
   RECUPERO FARMACI
   ========================= */
$farmaci = $conn->query("SELECT ID_FARMACO, NOME_FARMACO FROM farmaco");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Farmaci</title>
    <style>
        body { font-family: Arial; background:#f4f6f8; padding:20px }
        section { background:#fff; padding:20px; margin-bottom:25px; border-radius:8px }
        h2 { margin-top:0 }
        input, select, button {
            width:100%;
            padding:8px;
            margin:6px 0;
        }
        button {
            background:#0d6efd;
            color:#fff;
            border:none;
            border-radius:4px;
            cursor:pointer;
        }
        button:hover { background:#0b5ed7 }
    </style>
</head>

<body>

<section>
<h2>Inserisci Farmaco</h2>
<form method="POST">
    <input type="text" name="nome_farmaco" placeholder="Nome farmaco" required>
    <input type="text" name="categoria" placeholder="Categoria terapeutica">
    <input type="text" name="descrizione_farmaco" placeholder="Descrizione">
    <input type="number" name="totale_farmaci" placeholder="Totale farmaci" min="1" required>
    <button type="submit" name="ins_farmaco">Inserisci Farmaco</button>
</form>
</section>

<section>
<h2>Inserisci Principio Attivo</h2>
<form method="POST">
    <input type="text" name="nome_pa" placeholder="Nome principio attivo" required>
    <input type="text" name="descrizione_pa" placeholder="Descrizione">
    <button type="submit" name="ins_pa">Inserisci Principio Attivo</button>
</form>
</section>

<section>
<h2>Inserisci Interazione</h2>
<form method="POST">
    <label>Farmaco A</label>
    <select name="fa" required>
        <?php while ($r = $farmaci->fetch_assoc()) { ?>
            <option value="<?= $r['ID_FARMACO'] ?>">
                <?= $r['NOME_FARMACO'] ?>
            </option>
        <?php } ?>
    </select>

    <label>Farmaco B</label>
    <select name="fb" required>
        <?php
        $farmaci->data_seek(0);
        while ($r = $farmaci->fetch_assoc()) { ?>
            <option value="<?= $r['ID_FARMACO'] ?>">
                <?= $r['NOME_FARMACO'] ?>
            </option>
        <?php } ?>
    </select>

    <input type="text" name="descrizione_interazione" placeholder="Descrizione interazione" required>

    <select name="gravita" required>
        <option value="Bassa">Bassa</option>
        <option value="Media">Media</option>
        <option value="Grave">Grave</option>
    </select>

    <button type="submit" name="ins_interazione">Inserisci Interazione</button>
</form>
</section>

</body>
</html>
