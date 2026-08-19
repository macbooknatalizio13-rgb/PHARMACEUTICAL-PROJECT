<?php
include "connessione.php";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Farmaci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container my-5">

    <div class="alert alert-success text-center">
        Connessione al database effettuata correttamente
    </div>

    <!-- RICERCA FARMACO -->
    <section class="card mb-4 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Ricerca Farmaco</h4>

            <form method="POST" class="row g-2">
                <div class="col-md-9">
                    <input type="text" name="ric_farmaco" class="form-control"
                           placeholder="Inserisci nome del farmaco" required>
                </div>
                <div class="col-md-3 d-grid">
                    <button type="submit" name="cerca_farmaco" class="btn btn-primary">
                        Cerca
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['cerca_farmaco'])) {
                $stmt = $conn->prepare(
                    "SELECT ID_FARMACO, NOME_FARMACO, CATEGORIA_TERAPEUTICA, DESCRIZIONE
                     FROM farmaco
                     WHERE NOME_FARMACO LIKE CONCAT('%', ?, '%')"
                );
                $stmt->bind_param("s", $_POST['ric_farmaco']);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res->num_rows > 0) {
                    echo "<div class='table-responsive mt-3'>
                          <table class='table table-striped'>
                          <thead class='table-dark'>
                          <tr><th>ID</th><th>Nome</th><th>Categoria</th><th>Descrizione</th></tr>
                          </thead><tbody>";
                    while ($r = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>{$r['ID_FARMACO']}</td>
                                <td>{$r['NOME_FARMACO']}</td>
                                <td>{$r['CATEGORIA_TERAPEUTICA']}</td>
                                <td>{$r['DESCRIZIONE']}</td>
                              </tr>";
                    }
                    echo "</tbody></table></div>";
                } else {
                    echo "<p class='text-muted mt-3'>Nessun farmaco trovato.</p>";
                }
            }
            ?>
        </div>
    </section>

    <!-- RICERCA PRINCIPIO ATTIVO -->
    <section class="card mb-4 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Ricerca Principio Attivo</h4>

            <form method="POST" class="row g-2">
                <div class="col-md-9">
                    <input type="text" name="ric_pa" class="form-control"
                           placeholder="Nome del principio attivo" required>
                </div>
                <div class="col-md-3 d-grid">
                    <button type="submit" name="cerca_pa" class="btn btn-primary">
                        Cerca
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['cerca_pa'])) {
                $stmt = $conn->prepare(
                    "SELECT ID_PRINCIPIO_ATTIVO, NOME_PRINCIPIO, DESCRIZIONE
                     FROM principio_attivo
                     WHERE NOME_PRINCIPIO LIKE CONCAT('%', ?, '%')"
                );
                $stmt->bind_param("s", $_POST['ric_pa']);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res->num_rows > 0) {
                    echo "<div class='table-responsive mt-3'>
                          <table class='table table-striped'>
                          <thead class='table-dark'>
                          <tr><th>ID</th><th>Nome</th><th>Descrizione</th></tr>
                          </thead><tbody>";
                    while ($r = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>{$r['ID_PRINCIPIO_ATTIVO']}</td>
                                <td>{$r['NOME_PRINCIPIO']}</td>
                                <td>{$r['DESCRIZIONE']}</td>
                              </tr>";
                    }
                    echo "</tbody></table></div>";
                } else {
                    echo "<p class='text-muted mt-3'>Nessun principio attivo trovato.</p>";
                }
            }
            ?>
        </div>
    </section>

    <!-- INTERAZIONI -->
    <section class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Interazioni Farmacologiche</h4>

            <form method="POST" class="row g-2">
                <div class="col-md-9">
                    <select name="farmaco" class="form-select" required>
                        <?php
                        $f = $conn->query("SELECT ID_FARMACO, NOME_FARMACO FROM farmaco");
                        while ($r = $f->fetch_assoc()) {
                            echo "<option value='{$r['ID_FARMACO']}'>{$r['NOME_FARMACO']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 d-grid">
                    <button type="submit" name="cerca_inter" class="btn btn-danger">
                        Verifica
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['cerca_inter'])) {
                $stmt = $conn->prepare(
                    "SELECT f1.NOME_FARMACO AS FA, f2.NOME_FARMACO AS FB,
                            i.DESCRIZIONE_INTERAZIONE, i.LIVELLO_GRAVITA
                     FROM interazione i
                     JOIN farmaco f1 ON i.ID_FARMACO_A = f1.ID_FARMACO
                     JOIN farmaco f2 ON i.ID_FARMACO_B = f2.ID_FARMACO
                     WHERE i.ID_FARMACO_A = ? OR i.ID_FARMACO_B = ?"
                );
                $stmt->bind_param("ii", $_POST['farmaco'], $_POST['farmaco']);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res->num_rows > 0) {
                    echo "<div class='table-responsive mt-3'>
                          <table class='table table-bordered'>
                          <thead class='table-dark'>
                          <tr><th>Farmaco A</th><th>Farmaco B</th><th>Descrizione</th><th>Gravità</th></tr>
                          </thead><tbody>";
                    while ($r = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>{$r['FA']}</td>
                                <td>{$r['FB']}</td>
                                <td>{$r['DESCRIZIONE_INTERAZIONE']}</td>
                                <td>{$r['LIVELLO_GRAVITA']}</td>
                              </tr>";
                    }
                    echo "</tbody></table></div>";
                } else {
                    echo "<p class='text-muted mt-3'>Nessuna interazione rilevata.</p>";
                }
            }
            ?>
        </div>
    </section>

</div>
</body>
</html>


