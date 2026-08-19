<?php
include "connessione.php";
echo "Connessione OK";
$nome_farmaco = "";
$risultati_trovati = false;
if (isset($_POST["nome_farmaco"])) {
    $nome_farmaco = $_POST["nome_farmaco"];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Ricerca Farmaco</title>
</head>
<body>
<h2>Ricerca di un farmaco</h2>
<form method="POST" action="ricerca_farmaco.php">
<label>Inserisci il nome del farmaco:</label><br>
<input type="text" name="nome_farmaco" required>
<input type="submit" value="Cerca">
</form>
<br>
<?php
if ($nome_farmaco != "") {
    $sql = "SELECT * FROM Farmaco 
            WHERE NOME_FARMACO LIKE '%$nome_farmaco%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<h3>Farmaci trovati:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Nome Farmaco</th>
                <th>Categoria Terapeutica</th>
                <th>Descrizione</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["NOME_FARMACO"]."</td>";
            echo "<td>".$row["CATEGORIA_TERAPEUTICA"]."</td>";
            echo "<td>".$row["DESCRIZIONE"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p><strong>Nessun farmaco trovato con questo nome.</strong></p>";
}
}
?>
<br>
<a href="MENU2.php">Torna al menu</a>
</body>
</html>
