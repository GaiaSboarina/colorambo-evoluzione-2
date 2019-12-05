<?php
require "functions.php";

//creazione database e utente predefinito con tutti i privilegi
function createDB($conn, $name) {
    if (mysqli_query($conn, "CREATE DATABASE $name")) {
        echo "Database $name creato<br>";
    } else {
        die("Errore creazione database<br>");
    }
    mysqli_select_db($conn, $name);
    echo "Selezione database $name <br>";
    if (mysqli_query($conn, "CREATE USER '$name'@'localhost' IDENTIFIED BY '$name'")) {
        echo "Utente database $name creato<br>";
        mysqli_query($conn, "GRANT ALL PRIVILEGES ON $name.* TO '$name'@'localhost'");
        mysqli_query($conn, "FLUSH PRIVILEGES");
    } else {
        echo "Errore nella creazione dell'utente $nome";
    }
}

//creazione tabella
function createTable($conn, $tableName, $query) {
    if (mysqli_query($conn, $query)) {
        echo "Creata tabella $tableName <br>";
    } else {
        echo "Errore creazione tabella<br>";
    }
}

$connection = getConnection();
$sqlCreateTableUtenti = "CREATE TABLE utenti (
    nome VARCHAR(20) NOT NULL,
    cognome VARCHAR(20) NOT NULL,
    nascita DATE NOT NULL,
    residenza VARCHAR(50) NOT NULL,
    descrizione VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(30) NOT NULL,
    account VARCHAR(10) NOT NULL, 
    PRIMARY KEY (email) )";
// formato data attributo nascita è: AAAA-MM-GG
$sqlCreateTableColori = "CREATE TABLE colori (
    nome VARCHAR(20) PRIMARY KEY, 
    codice VARCHAR(7) NOT NULL, 
    creatore VARCHAR(50) NOT NULL, 
    FOREIGN KEY (creatore) REFERENCES utenti(email) )";

createDB($connection, "colorambo-evoluzione");
createTable($connection, "utenti", $sqlCreateTableUtenti);
createTable($connection, "colori", $sqlCreateTableColori);
addUtente($connection, "Admin", "Admin", '1900-01-01', "Via Admin", "Admin", "admin", "admin", "Admin");
echo '<br><br><a href="index.php">Vai al sito</a>';
//robe fatte: creazione database, utente con tutti i privilegi sul database, creazione tabelle, aggiunta utente admin
?>