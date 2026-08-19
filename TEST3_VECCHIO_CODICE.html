<?php
include "connessione.php";
echo "Connessione OK";
?>
<section>
<h2>Inserisci Farmaco</h2>
<form method="POST">
    <input type="text" name="nome_farmaco" placeholder="Nome farmaco" required><br>
    <input type="text" name="categoria" placeholder="Categoria terapeutica"><br>
    <input type="text" name="descrizione_farmaco" placeholder="Descrizione"><br>
    <input type="number" name="totale_farmaci" placeholder="Totale farmaci" min="1" required><br>
    <input type="submit" name="ins_farmaco" value="Inserisci Farmaco">
</form>

<?php
include "connessione.php";

if (isset($_POST['ins_farmaco'])) {

    $nome = $_POST['nome_farmaco'];
    $categoria = $_POST['categoria'];
    $descrizione = $_POST['descrizione_farmaco'];
    $totale = $_POST['totale_farmaci'];

    if (!empty($nome) && !empty($totale)) {

        $sql = "INSERT INTO Farmaco
                (NOME_FARMACO, CATEGORIA_TERAPEUTICA, DESCRIZIONE, TOTALE_FARMACI)
                VALUES
                ('$nome', '$categoria', '$descrizione', $totale)";

        if ($conn->query($sql)) {
            echo "<p style='color:green'><strong>Farmaco inserito correttamente</strong></p>";
        } else {
            echo "<p style='color:red'>Errore SQL: " . $conn->error . "</p>";
        }

    } else {
        echo "<p style='color:red'>Compilare tutti i campi obbligatori</p>";
    }
}
?>
</section>

</section>
<section>
<h2>Inserisci Principio Attivo</h2>

<form method="POST">
    <input type="text" name="nome_pa" placeholder="Nome principio attivo" required><br>
    <input type="text" name="descrizione_pa" placeholder="Descrizione"><br>
    <input type="submit" name="ins_pa" value="Inserisci Principio Attivo">
</form>
<?php
if (isset($_POST['ins_pa'])) {
    $conn->query("
        INSERT INTO principio_attivo (NOME_PRINCIPIO, DESCRIZIONE)
        VALUES ('{$_POST['nome_pa']}', '{$_POST['descrizione_pa']}')
    ");
    echo "<p><strong>Principio attivo inserito correttamente</strong></p>";
}
?>
</section>
<section>
<h2>Inserisci Interazione</h2>
<form method="POST">
    <label>Farmaco A</label><br>
    <select name="fa" required>
        <?php
        $f = $conn->query("SELECT ID_FARMACO, NOME_FARMACO FROM farmaco");
        while ($r = $f->fetch_assoc()) {
            echo "<option value='{$r['ID_FARMACO']}'>{$r['NOME_FARMACO']}</option>";
        }
        ?>
    </select><br><br>

    <label>Farmaco B</label><br>
    <select name="fb" required>
        <?php
        $f = $conn->query("SELECT ID_FARMACO, NOME_FARMACO FROM farmaco");
        while ($r = $f->fetch_assoc()) {
            echo "<option value='{$r['ID_FARMACO']}'>{$r['NOME_FARMACO']}</option>";
        }
        ?>
    </select><br><br>

    <input type="text" name="descrizione_interazione" placeholder="Descrizione" required><br><br>

    <select name="gravita" required>
        <option value="Bassa">Bassa</option>
        <option value="Media">Media</option>
        <option value="Grave">Grave</option>
    </select><br><br>

    <input type="submit" name="ins_interazione" value="Inserisci Interazione">
</form>
<?php
if (isset($_POST['ins_interazione'])) {
    $a = $_POST['fa'];
    $b = $_POST['fb'];

    if ($a != $b) {

        if ($a > $b) { [$a, $b] = [$b, $a]; }

        $conn->query("
            INSERT INTO interazione 
            (ID_FARMACO_A, ID_FARMACO_B, DESCRIZIONE_INTERAZIONE, LIVELLO_GRAVITA)
            VALUES ($a, $b, '{$_POST['descrizione_interazione']}', '{$_POST['gravita']}')
        ");

        echo "<p><strong>Interazione inserita correttamente</strong></p>";
    } else {
        echo "<p style='color:red'><strong>Seleziona due farmaci diversi</strong></p>";
    }
}
?>
</section>

