<?php

session_start();

// DEFINITION DES VARIABLES POUR LA CONNEXION A LA DATABASE

$servername = "localhost";
$username = "Eric";
$password = "";
$dbname = "ariassebericmusique";


// FONCTION DE CONNEXION A LA DB
try {
    // DEFINITION DE LA CONNEXION (LOGIN UTILISATEUR ET NOM DE LA DB (avec les variables precedentes))
    $dsn = "mysql:host=" . $servername . ";dbname=" . $dbname;
    $pdo = new PDO($dsn, $username, $password);

    // catch: ATTRAPE LES ERREURS DE LA FONCTION try
} catch (PDOException $e) {
    echo "Connexion a la DB echoué: " . $e->getMessage();
}

// setATTRIBUTE:  Configure un attribut PDO
// ATTR_DEFAULT_FETCH_MODE: Définit le mode de récupération par défaut.
// FETCH_OBJ: Récupère la prochaine ligne et la retourne en tant qu'objet
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
