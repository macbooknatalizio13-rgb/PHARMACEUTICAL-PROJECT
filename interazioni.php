<?php
include "connessione.php";
echo "Connessione OK";
$sql = "
SELECT 
    F1.NOME_FARMACO AS Farmaco_A,
    F2.NOME_FARMACO AS Farmaco_B,
    I.DESCRIZIONE_INTERAZIONE,
    I.LIVELLO_GRAVITA
FROM Interazione I
JOIN Farmaco F1 ON I.ID_FARMACO_A = F1.ID_FARMACO
JOIN Farmaco F2 ON I.ID_FARMACO_B = F2.ID_FARMACO
";
$result = $conn->query($sql);
?>
<h2>Interazioni tra Farmaci</h2>
<table border="1">
<tr>
    <th>Farmaco 1</th>
    <th>Farmaco 2</th>
    <th>Descrizione Interazione</th>
    <th>Livello Gravità</th>
</tr>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['Farmaco_A']."</td>";
    echo "<td>".$row['Farmaco_B']."</td>";
    echo "<td>".$row['DESCRIZIONE_INTERAZIONE']."</td>";
    echo "<td>".$row['LIVELLO_GRAVITA']."</td>";
    echo "</tr>";
}
?>
</table>
