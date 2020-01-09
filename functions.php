<?php

//connessione al dbms
function getConnection() {
    $connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die("Connessione non riuscita<br>");
    } /*else {
        echo "Connessione al database riuscita<br>";
    }*/
    return $connection;
}

//verifica se esiste il database
function databaseExists($name, $connection) {
    $databases = [];
    $trovato = false;
    $result = mysqli_query($connection, "SHOW DATABASES");
    if ($result) {
        $databases = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach($databases as $database) {
            if ($database['Database'] == "colorambo_evoluzione") {
                $trovato = true;
            }
        }
    }
    return $trovato;
}

//aggiunge un utente alla tabella degli utenti
function addUtente($conn, $nome, $cognome, $nascita, $residenza, $descrizione, $email, $password, $account) {
    $query = "INSERT INTO utenti 
            (nome, cognome, nascita, residenza, descrizione, email, password, account) 
            VALUES
            ('$nome', '$cognome', '$nascita', '$residenza', '$descrizione', '$email', '$password', '$account')";
    if (mysqli_query($conn, $query)) {
        echo "Inserito utente $email<br>";
    } else {
        die("Errore nell'inserimento di $email<br>");
    }
}

//prende dati da una tabella
function getDati($query) {
    $connection = getConnection();
    $result = mysqli_query($connection, $query);
    $dati = [];
    if ($result) {
        $dati = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $dati;
}

//aggiungere colore
function addColor($nome, $codice, $creatore) {
    $connection = getConnection();
    $creatori = getDati("SELECT * FROM utenti");
    if (in_array($creatore, $creatori)) {
        $query = "INSERT INTO colori (nome, codice, creatore)
                VALUES ('$nome', '$codice', '$creatore'";
        if (mysqli_query($connection, $query)) {
            echo "Inserito colore $nome<br>";
        } else {
            die("Errore nell'inserimento del colore $nome<br>");
        }
    } else {
        echo "Il creatore $creatore non esiste";
    }
}

//login
function login($email, $password) {
    $dati = getDati("SELECT email, password FROM utenti WHERE email = '$email' AND password = '$password'");
    if (count($dati) > 0) {
        echo "login";
    }
    else {
        echo "utente non registrato";
    }
}

//fatto: connessione database, verifica se esiste il database, aggiunta utente, ritornare array di colori o utenti dal database, aggiunta colori, login
?>
