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
        echo "Errore creazione tabella $tableName<br>";
    }
}

//carica 18 colori in tabella colori
function caricaColori($conn) {
    $nomi = [
        "blue",
        "red",
        "yellow",
        "green",
        "white",
        "grey",
        "black",
        "brown",
        "pink",
        "purple",
        "violet",
        "light-blue",
        "orange",
        "darkcyan",
        "yellowgreen",
        "turchese",
        "jungle",
        "coral"
    ];
    $codici = [
        "#0000ff",
        "#ff0000",
        "#ffff00",
        "#00ff00",
        "#ffffff",
        "#d3d3d3",
        "#000000",
        "#654321",
        "#ffc0cb",
        "#800080",
        "#7f00ff",
        "#add8e6",
        "#ffa500",
        "#008b8b",
        "#9acd32",
        "#30d5c8",
        "#29ab87",
        "#ff7f50"
    ];
    for ($i=0; $i < count($nomi); $i++) { 
        $queryAddColors = "INSERT INTO colori 
            (nome, codice, creatore) 
            VALUES
            ('" . $nomi[$i];
        $queryAddColors = $queryAddColors . "', '" . $codici[$i] . "', 'Admin')";
        if (mysqli_query($conn, $queryAddColors)) {
            echo $i + 1 . ". Colore " . $nomi[$i] . " aggiunto<br>";
        } else {
            echo $i + 1 . ". Errore nell'aggiunta del colore " . $nomi[$i] . "<br>";
        }
    }
}


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

$sqlCreateTablePreferiti = "CREATE TABLE preferiti (
    id INT AUTO_INCREMENT NOT NULL, 
    colore VARCHAR(20) NOT NULL, 
    utente VARCHAR(50) NOT NULL, 
    PRIMARY KEY (id), 
    FOREIGN KEY (colore) REFERENCES colori(nome), 
    FOREIGN KEY (utente) REFERENCES utenti(email) )";

$connection = getConnection();
createDB($connection, "colorambo_evoluzione");
createTable($connection, "utenti", $sqlCreateTableUtenti);
createTable($connection, "colori", $sqlCreateTableColori);
createTable($connection, "preferiti", $sqlCreateTablePreferiti);
addUtente($connection, "Admin", "Admin", '1900-01-01', "Via Admin", "Admin", "Admin", "Admin", "Admin");
echo "<br>";
caricaColori($connection);
mysqli_close();
echo '<br><br><a href="index.php">Vai al sito</a>';

?>
