<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Farmaci</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        h2 {
            margin-top: 30px;
            color: #34495e;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 12px 0;
        }

        a {
            display: block;
            padding: 12px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        a:hover {
            background: #2980b9;
        }

        .section {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistema di gestione dei farmaci e delle interazioni</h1>

    <div class="section">
        <h2>Visualizzazione</h2>
        <ul>
            <li><a href="farmaci.php">Visualizza Farmaci (Prototype)</a></li>
            <li><a href="principi_attivi.php">Visualizza Principi Attivi (Prototype)</a></li>
            <li><a href="interazioni.php">Visualizza Interazioni tra Farmaci (Prototype)</a></li>
            <li><a href="TEST.php">Visualizza Completa (Farmaci, Principi Attivi, Interazioni)</a></li>
        </ul>
    </div>

    <div class="section">
        <h2>Ricerca</h2>
        <ul>
            <li><a href="ricerca_farmaco.php">Ricerca Farmaco (Prototype)</a></li>
            <li><a href="TEST2.php">Ricerca Completa (Farmaci, Principi Attivi, Interazioni)</a></li>
        </ul>
    </div>
    <div class="section">
        <h2>Inserimento Dati</h2>
        <ul>
            <li><a href="inserisci_interazione.php">Inserisci Interazione (Prototype)</a></li>
            <li><a href="TEST3.php">Inserimento Completo (Farmaci, Principi Attivi, Interazioni)</a></li>
        </ul>
    </div>
	<div class="section">
        <ul>
      <li><a href="MENU2.php">PAGINA INIZIALE</a></li>
        </ul>
    </div>
</div>
</body>
</html>
