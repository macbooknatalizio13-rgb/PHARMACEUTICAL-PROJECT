<?php
include "connessione.php";
echo "Connessione OK";
?>
<section>
<h2>Ricerca Farmaco</h2>
<form method="POST">
    <input type="text" name="ric_farmaco" placeholder="Nome farmaco" required>
    <input type="submit" name="cerca_farmaco" value="Cerca">
</form>

<?php
if (isset($_POST['cerca_farmaco'])) {
    $nome = $_POST['ric_farmaco'];
    $res = $conn->query("
        SELECT * FROM farmaco 
        WHERE NOME_FARMACO LIKE '%$nome%'
    ");

    echo "<table>
            <tr><th>ID</th><th>Nome</th><th>Categoria</th><th>Descrizione</th></tr>";
    while ($r = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$r['ID_FARMACO']}</td>
                <td>{$r['NOME_FARMACO']}</td>
                <td>{$r['CATEGORIA_TERAPEUTICA']}</td>
                <td>{$r['DESCRIZIONE']}</td>
              </tr>";
    }
    echo "</table>";
}
?>
</section>
<section>
<h2>Ricerca Principio Attivo</h2>
<form method="POST">
    <input type="text" name="ric_pa" placeholder="Nome principio attivo" required>
    <input type="submit" name="cerca_pa" value="Cerca">
</form>
<?php
if (isset($_POST['cerca_pa'])) {
    $nome = $_POST['ric_pa'];

    $res = $conn->query("
        SELECT * FROM principio_attivo
        WHERE NOME_PRINCIPIO LIKE '%$nome%'
    ");

    echo "<table>
            <tr><th>ID</th><th>Nome</th><th>Descrizione</th></tr>";
    while ($r = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$r['ID_PRINCIPIO_ATTIVO']}</td>
                <td>{$r['NOME_PRINCIPIO']}</td>
                <td>{$r['DESCRIZIONE']}</td>
              </tr>";
    }
    echo "</table>";
}
?>
</section>
<section>
<h2>Ricerca Interazioni per Farmaco</h2>
<form method="POST">
    <select name="farmaco" required>
        <?php
        $f = $conn->query("SELECT ID_FARMACO, NOME_FARMACO FROM farmaco");
        while ($r = $f->fetch_assoc()) {
            echo "<option value='{$r['ID_FARMACO']}'>{$r['NOME_FARMACO']}</option>";
        }
        ?>
    </select>
    <input type="submit" name="cerca_inter" value="Cerca">
</form>
<?php
if (isset($_POST['cerca_inter'])) {
    $id = $_POST['farmaco'];

    $res = $conn->query("
        SELECT f1.NOME_FARMACO AS FA, f2.NOME_FARMACO AS FB,
               i.DESCRIZIONE_INTERAZIONE, i.LIVELLO_GRAVITA
        FROM interazione i
        JOIN farmaco f1 ON i.ID_FARMACO_A = f1.ID_FARMACO
        JOIN farmaco f2 ON i.ID_FARMACO_B = f2.ID_FARMACO
        WHERE i.ID_FARMACO_A = $id OR i.ID_FARMACO_B = $id
    ");

    echo "<table>
            <tr><th>Farmaco A</th><th>Farmaco B</th><th>Descrizione</th><th>Gravità</th></tr>";
    while ($r = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$r['FA']}</td>
                <td>{$r['FB']}</td>
                <td>{$r['DESCRIZIONE_INTERAZIONE']}</td>
                <td>{$r['LIVELLO_GRAVITA']}</td>
              </tr>";
    }
    echo "</table>";
}
?>
</section>
