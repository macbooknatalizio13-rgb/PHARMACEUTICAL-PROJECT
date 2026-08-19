<?php
include "connessione.php";
echo "Connessione OK";
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Farmaci</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        section { border: 1px solid #ccc; padding: 15px; margin-bottom: 25px; }
        h2 { margin-top: 0; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #aaa; padding: 6px; text-align: left; }
        input, select { padding: 5px; margin: 5px 0; width: 250px; }
        input[type=submit] { width: auto; }
    </style>
</head>
<body>

<h1>Gestione Farmaci e Interazioni</h1>

<!-- ================= VISUALIZZA PRINCIPI ATTIVI ================= -->
<section>
<h2>Visualizza Principi Attivi</h2>
<table>
<tr><th>ID</th><th>Nome</th><th>Descrizione</th></tr>
<?php
$res = $conn->query("SELECT * FROM principio_attivo");
while ($r = $res->fetch_assoc()) {
    echo "<tr>
            <td>{$r['ID_PRINCIPIO_ATTIVO']}</td>
            <td>{$r['NOME_PRINCIPIO']}</td>
            <td>{$r['DESCRIZIONE']}</td>
          </tr>";
}
?>
</table>
</section>
<!-- ================= VISUALIZZA INTERAZIONI ================= -->
<section>
<h2>Visualizza Interazioni</h2>
<table>
<tr>
<th>ID</th><th>Farmaco A</th><th>Farmaco B</th><th>Descrizione</th><th>Gravità</th>
</tr>
<?php
$sql = "
SELECT i.ID_INTERAZIONE, f1.NOME_FARMACO AS FA, f2.NOME_FARMACO AS FB,
       i.DESCRIZIONE_INTERAZIONE, i.LIVELLO_GRAVITA
FROM interazione i
JOIN farmaco f1 ON i.ID_FARMACO_A = f1.ID_FARMACO
JOIN farmaco f2 ON i.ID_FARMACO_B = f2.ID_FARMACO
";
$res = $conn->query($sql);
while ($r = $res->fetch_assoc()) {
    echo "<tr>
        <td>{$r['ID_INTERAZIONE']}</td>
        <td>{$r['FA']}</td>
        <td>{$r['FB']}</td>
        <td>{$r['DESCRIZIONE_INTERAZIONE']}</td>
        <td>{$r['LIVELLO_GRAVITA']}</td>
    </tr>";
}
?>
</table>
</section>
<!-- ================= VISUALIZZA FARMACI ================= -->
<section>
<h2>Visualizza Farmaci</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Categoria</th>
    <th>Descrizione</th>
	<th>Totale_farmaci</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM farmaco");
while ($r = $res->fetch_assoc()) {
    echo "<tr>
            <td>{$r['ID_FARMACO']}</td>
            <td>{$r['NOME_FARMACO']}</td>
            <td>{$r['CATEGORIA_TERAPEUTICA']}</td>
            <td>{$r['DESCRIZIONE']}</td>
			<td>{$r['TOTALE_FARMACI']}</td>
          </tr>";
}
?>
</table>
</section>
