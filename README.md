Progetto Accademico – Base Dati per Farmaci, Principi Attivi e Interazioni Farmacologiche
Descrizione del progetto
Questo progetto consiste nella progettazione, implementazione e sperimentazione di una base di dati relazionale per la gestione di:

Farmaci (nome, categoria terapeutica, descrizione)
Principi attivi (nome e descrizione)
Interazioni farmacologiche tra due farmaci (descrizione e livello di gravità: Bassa / Media / Grave)

L’obiettivo principale è consentire la consultazione e la gestione delle informazioni relative ai possibili effetti avversi derivanti dall’assunzione contemporanea di più medicinali, 
con particolare attenzione alla sicurezza del paziente.
Il sistema è stato sviluppato come progetto sperimentale accademico** e include:

1. Analisi dei requisiti funzionali e non funzionali
2. Modellazione concettuale (diagramma Entità-Relazione)
3. Conversione in schema relazionale
4. Implementazione completa in SQL (DDL, DML, interrogazioni, join, aggregazioni, subquery, DCL)
5. Sperimentazione su database reale (MySQL)
6. Realizzazione di un’interfaccia web in PHP + HTML + Bootstrap per interagire con i dati

Struttura del database Tabelle principali

Tabella               Descrizione                                                                 
`farmaco`             Contiene i medicinali (ID, nome, categoria terapeutica, descrizione)       
 `principio_attivo`    Contiene i principi attivi (ID, nome, descrizione)                         
 `interazione`         Contiene le interazioni tra due farmaci (farmaco A, farmaco B, descrizione, livello di gravità) 

Sono presenti chiavi primarie, chiavi esterne e vincoli di integrità referenziale (CASCADE sulle eliminazioni).
Il file di dump completo del database di test è: `farmaco_test.sql`
 Tecnologie utilizzate
- Database: MySQL / MariaDB
- Backend: PHP (mysqli)
- Frontend: HTML5 + Bootstrap 5 + Bootstrap Icons
- Ambiente di sviluppo: XAMPP / locale (localhost)
- Documentazione: Microsoft Word (documento completo di progetto)

Struttura dei file
PROGETTO_FARMACO/
connessione.php              # Connessione al database MySQL
farmaci.php                  # Visualizzazione elenco farmaci
farmaco.php                  # Dettaglio singolo farmaco
principi_attivi.php          # Visualizzazione principi attivi
interazioni.php              # Visualizzazione interazioni farmacologiche
ricerca_farmaco.php          # Funzionalità di ricerca
inserisci_interazione.php    # Form di inserimento nuova interazione
MENU1.php                    # Prototipo interfaccia 1.0
MENU2.php                    # Prototipo interfaccia 2.0 (versione più completa con Bootstrap)
TEST*.php                    # File di prova e prototipi precedenti
farmaco_test.sql             # Dump completo del database di test
PROGETTO-ACCADEMICO.docx     # Documentazione completa del progetto

Funzionalità implementate
- Visualizzazione elenco farmaci, principi attivi e interazioni
- Ricerca di farmaci
- Inserimento di nuove interazioni farmacologiche tramite form
- Controllo di base (non è possibile inserire un’interazione tra lo stesso farmaco)
- Interfaccia web responsive basata su Bootstrap
- Gestione delle relazioni tramite JOIN
- Operazioni di base CRUD e interrogazioni avanzate documentate nel file SQL e nella documentazione

 Come avviare il progetto (ambiente locale)
1. Installare XAMPP (o equivalente con Apache + MySQL + PHP)
2. Creare un database chiamato `farmaco_test`
3. Importare il file `farmaco_test.sql` tramite phpMyAdmin
4. Copiare la cartella `PROGETTO_FARMACO` nella directory `htdocs`
5. Avviare Apache e MySQL
6. Aprire nel browser: `http://localhost/PROGETTO_FARMACO/MENU2.php` (o il file di menu preferito)

Credenziali di default (file `connessione.php`):
- Host: `localhost`
- User: `root`
- Password: (vuota)
- Database: `farmaco_test`

 Documentazione completa

Il file `PROGETTO-ACCADEMICO.docx` contiene l’intera documentazione del progetto, suddivisa in:
- Introduzione e obiettivi
- Analisi dei requisiti
- Modellazione E/R (entità, relazioni, diagrammi)
- Schema relazionale
- Implementazione SQL completa (DDL, DML, SELECT, JOIN, aggregazioni, subquery, DCL)
- Sperimentazione su database reale
- Implementazione dell’applicazione web (PHP/HTML)
- Screenshot e codici sorgente
- Conclusioni

Questo è un progetto sperimentale/accademico:

- Capacità di analisi e progettazione di una base di dati
- Conoscenza di SQL e modellazione relazionale
- Capacità di realizzare un’interfaccia web funzionante collegata a un database
- Attenzione a un dominio sensibile (sanitario / farmaceutico)

Limitazioni attuali:
- Dati di test (non reali)
- Assenza di autenticazione utenti / sistema di login
- Assenza di validazione avanzata e protezione completa da SQL Injection (utilizzo di query non preparate in alcune parti)
- Mancanza di alcune tabelle di associazione complete (farmaco ↔ principio attivo) nel dump fornito
- Interfaccia ancora in fase di prototipo
