<?php
include "connessione.php";
echo "<p style='color:green;font-weight:bold'>Connessione OK</p>";
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Farmaci</title>

<style>
body {
    font-family: "Segoe UI", Arial, sans-serif;
    background-color: #f4f6f9;
    margin: 0;
}

/* ===== HEADER ===== */
.topbar {
    background-color: #2c3e50;
    color: #fff;
    padding: 20px;
}

.topbar h1 {
    margin: 0;
    font-size: 26px;
}

.topbar nav {
    margin-top: 10px;
}

.topbar nav a {
    color: #ecf0f1;
    margin-right: 20px;
    text-decoration: none;
    font-weight: 500;
}

.topbar nav a:hover {
    text-decoration: underline;
}

/* ===== CONTENITORE ===== */
.container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 20px;
}

/* ===== SEZIONI ===== */
section {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}

section h2 {
    margin-top: 0;
    color: #2c3e50;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 10px;
}

/* ===== TABELLE ===== */
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 15px;
}

th {
    background-color: #34495e;
    color: #fff;
    padding: 10px;
    text-align: left;
}

td {
    padding: 9px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #eaf2f8;
}
</style>
</head>

<body>

<header class="topbar">
    <h1>Gestione Farmaci e Interazioni</h1>
    <nav>
        <a href="#principi">Principi Attivi</a>
        <a href="#interazioni">Interazioni</a>
        <a href="#farmaci">Farmaci</a>
    </nav>
</header>

<div class="container">

<!-- ================= PRINCIPI ATTIVI ================= -->
<section id="principi">
<h2>Principi Attivi</h2>
<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrizione</th>
</tr>
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

<!-- ================= INTERAZIONI ================= -->
<section id="interazioni">
<h2>Interazioni Farmacologiche</h2>
<table>
<tr>
    <th>ID</th>
    <th>Farmaco A</th>
    <th>Farmaco B</th>
    <th>Descrizione</th>
    <th>Gravità</th>
</tr>
<?php
$sql = "
SELECT i.ID_INTERAZIONE, 
       f1.NOME_FARMACO AS FA, 
       f2.NOME_FARMACO AS FB,
       i.DESCRIZIONE_INTERAZIONE, 
       i.LIVELLO_GRAVITA
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

<!-- ================= FARMACI ================= -->
<section id="farmaci">
<h2>Elenco Farmaci</h2>
<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Categoria</th>
    <th>Descrizione</th>
    <th>Totale</th>
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

</div>
</body>
</html>
