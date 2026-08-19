<?php
include "connessione.php";
echo "Connessione OK";
$sql = "SELECT NOME_FARMACO, CATEGORIA_TERAPEUTICA, DESCRIZIONE, TOTALE_FARMACI FROM Farmaco";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Elenco Farmaci</title>
</head>
<body>
<h2>Elenco dei Farmaci</h2>
<table border="1">
 <tr>
        <th>Nome Farmaco</th>
        <th>Categoria Terapeutica</th>
        <th>Descrizione</th>
        <th>Totale Farmaci</th>
</tr>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['NOME_FARMACO']."</td>";
    echo "<td>".$row['CATEGORIA_TERAPEUTICA']."</td>";
    echo "<td>".$row['DESCRIZIONE']."</td>";
    echo "<td>".$row['TOTALE_FARMACI']."</td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>
