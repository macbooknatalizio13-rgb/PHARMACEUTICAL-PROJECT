<?php
include "connessione.php";
echo "Connessione OK";
$farmaci = $conn->query("SELECT ID_FARMACO, NOME_FARMACO FROM Farmaco");
?>
<form method="POST" action="inserisci_interazione.php">

    <label>Farmaco A:</label><br>
    <select name="farmaco_a" required>
        <?php
        while ($row = $farmaci->fetch_assoc()) {
            echo "<option value='".$row['ID_FARMACO']."'>".$row['NOME_FARMACO']."</option>";
        }
        ?>
    </select><br><br>
    <label>Farmaco B:</label><br>
    <select name="farmaco_b" required>
        <?php
        $farmaci = $conn->query("SELECT ID_FARMACO, NOME_FARMACO FROM Farmaco");
        while ($row = $farmaci->fetch_assoc()) {
            echo "<option value='".$row['ID_FARMACO']."'>".$row['NOME_FARMACO']."</option>";
        }
        ?>
    </select><br><br>
    <label>Descrizione interazione:</label><br>
    <input type="text" name="descrizione" required><br><br>
    <label>Livello di gravità:</label><br>
    <select name="gravita">
        <option value="Bassa">Bassa</option>
        <option value="Media">Media</option>
        <option value="Grave">Grave</option>
    </select><br><br>
    <input type="submit" name="invia" value="Inserisci Interazione">
</form>
<?php
if (isset($_POST['invia'])) {

    $fa = $_POST['farmaco_a'];
    $fb = $_POST['farmaco_b'];
    $desc = $_POST['descrizione'];
    $grav = $_POST['gravita'];
    if ($fa != $fb) {

        $sql = "INSERT INTO Interazione 
                (ID_FARMACO_A, ID_FARMACO_B, DESCRIZIONE_INTERAZIONE, LIVELLO_GRAVITA)
                VALUES ('$fa', '$fb', '$desc', '$grav')";

        if ($conn->query($sql) === TRUE) {
            echo "<p><strong>Interazione inserita correttamente.</strong></p>";
        } else {
            echo "<p>Errore: ".$conn->error."</p>";
        }

    } else {
        echo "<p><strong>Errore: selezionare due farmaci diversi.</strong></p>";
    }
}
?>