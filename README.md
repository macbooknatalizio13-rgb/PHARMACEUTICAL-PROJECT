# Sistema di Gestione dei Farmaci e delle Interazioni

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat-square&logo=bootstrap&logoColor=white)
![Status](https://img.shields.io/badge/Stato-Sperimentale-orange?style=flat-square)
![License](https://img.shields.io/badge/Licenza-Educativa-lightgrey?style=flat-square)

**Progetto sperimentale di progettazione e implementazione di una base di dati relazionale** dedicata alla gestione di farmaci, principi attivi e interazioni farmacologiche.

Il sistema consente di memorizzare, consultare e aggiornare informazioni relative ai farmaci e alle possibili interazioni derivanti dalla loro assunzione combinata, con particolare attenzione agli effetti avversi.

> **Avvertenza**  
> Questo progetto è stato realizzato esclusivamente a scopo didattico e sperimentale.  
> Non è destinato all’utilizzo in ambito clinico o professionale.

---

## Obiettivi del progetto

Il lavoro documenta l’intero ciclo di sviluppo di un sistema informativo, articolato nelle seguenti fasi metodologiche:

1. **Analisi dei requisiti** — definizione degli obiettivi funzionali e non funzionali
2. **Modellazione concettuale** — progettazione del modello Entità-Relazione
3. **Progettazione logica** — traduzione in schema relazionale con vincoli di integrità
4. **Implementazione** — realizzazione del database e dell’interfaccia web
5. **Sperimentazione e valutazione** — test funzionali e analisi dei risultati

L’interfaccia è stata sviluppata in modo incrementale, partendo da prototipi semplici fino a raggiungere versioni strutturate e usabili.

## Note tecniche e di sicurezza

Le versioni ufficiali (TEST.php, TEST2.php, TEST3.php) utilizzano prepared statements.
I file prototipo e le versioni storiche contengono query realizzate mediante concatenazione di stringhe e presentano vulnerabilità note (SQL Injection). Sono stati mantenuti esclusivamente a scopo didattico e di documentazione dell’evoluzione del codice.
Il sistema non implementa meccanismi di autenticazione, gestione delle sessioni o protezione CSRF.
L’utilizzo in ambienti di produzione non è raccomandato senza interventi di hardening.

---

## Funzionalità

### Versione ufficiale

| Modulo                    | File        | Descrizione                                              |
|---------------------------|-------------|----------------------------------------------------------|
| Visualizzazione completa  | `TEST.php`  | Elenco integrato di farmaci, principi attivi e interazioni (con JOIN) |
| Ricerca avanzata          | `TEST2.php` | Ricerca per nome e verifica delle interazioni di un farmaco |
| Inserimento dati          | `TEST3.php` | Inserimento controllato di farmaci, principi attivi e interazioni |

### Versioning e prototipi

Sono state conservate le versioni precedenti del codice (`*_VECCHIO_CODICE.php`) e i prototipi iniziali, al fine di documentare l’evoluzione tecnica e metodologica del progetto.

| Prototipo                     | File                        |
|-------------------------------|-----------------------------|
| Elenco farmaci                | `farmaci.php`               |
| Elenco principi attivi        | `principi_attivi.php`       |
| Elenco interazioni            | `interazioni.php`           |
| Ricerca farmaco               | `ricerca_farmaco.php`       |
| Inserimento interazione       | `inserisci_interazione.php` |

---

## Stack tecnologico

| Livello          | Tecnologia                          |
|------------------|-------------------------------------|
| Backend          | PHP 7.4+ (MySQLi)                   |
| Database         | MySQL / MariaDB                     |
| Frontend         | HTML5, CSS3, Bootstrap 5            |
| Icone            | Bootstrap Icons                     |
| Sicurezza        | Prepared Statements (versioni ufficiali) |

---

## Schema del database

### Tabella `farmaco`

| Campo                    | Tipo             | Descrizione                    |
|--------------------------|------------------|--------------------------------|
| `ID_FARMACO`             | INT (PK, AI)     | Identificativo univoco         |
| `NOME_FARMACO`           | VARCHAR(100)     | Nome commerciale del farmaco   |
| `CATEGORIA_TERAPEUTICA`  | VARCHAR(100)     | Categoria terapeutica          |
| `DESCRIZIONE`            | TEXT             | Descrizione                    |
| `TOTALE_FARMACI`         | INT              | Quantità (campo opzionale)     |

### Tabella `principio_attivo`

| Campo                    | Tipo             | Descrizione                    |
|--------------------------|------------------|--------------------------------|
| `ID_PRINCIPIO_ATTIVO`    | INT (PK, AI)     | Identificativo univoco         |
| `NOME_PRINCIPIO`         | VARCHAR(100)     | Nome del principio attivo      |
| `DESCRIZIONE`            | TEXT             | Descrizione                    |

### Tabella `interazione`

| Campo                      | Tipo             | Descrizione                          |
|----------------------------|------------------|--------------------------------------|
| `ID_INTERAZIONE`           | INT (PK, AI)     | Identificativo univoco               |
| `ID_FARMACO_A`             | INT (FK)         | Riferimento al primo farmaco         |
| `ID_FARMACO_B`             | INT (FK)         | Riferimento al secondo farmaco       |
| `DESCRIZIONE_INTERAZIONE`  | TEXT             | Descrizione dell’interazione         |
| `LIVELLO_GRAVITA`          | VARCHAR(50)      | Bassa · Media · Grave                |

Sono presenti vincoli di integrità referenziale sulle chiavi esterne della tabella `interazione`.

## Installazione

### Requisiti

- PHP ≥ 7.4
- MySQL 5.7+ o MariaDB
- Server web (Apache / Nginx) oppure ambiente XAMPP / WAMP / LAMP

### Procedura

1. Creare un database denominato `farmaco_test`
2. Importare il file `farmaco_test.sql`
3. Configurare le credenziali di accesso nel file `connessione.php`:
4. Posizionare tutti i file nella directory del server web
5. Avviare i servizi Apache e MYSQL
6. Accedere all' applicazione all' indirizzo:
7. http://localhost/nome-cartella/MENU2.php

```php
$host     = "localhost";
$user     = "root";
$password = "";
$dbname   = "farmaco_test";   

