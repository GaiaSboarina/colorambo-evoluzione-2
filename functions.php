<?php

//connessione al dbms
function getConnection() {
    $connection = mysqli_connect("localhost", "root", "");
    if ($connection) {
        echo "Connessione al database riuscita<br>";
    } else {
        die("Connessione non riuscita<br>");
    }
    return $connection;
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



//fatto: connessione database, aggiunta utente
?>