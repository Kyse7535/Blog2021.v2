<?php

function connexion()
{
    $jawsdbUrl = getenv('JAWSDB_URL'); // Replace with your actual URL if not using environment variables

    // Parse the URL to extract connection components
    $dbParts = parse_url($jawsdbUrl);

    // Build the DSN
    $dsn = "mysql:host=" . $dbParts['host'] . ";port=" . $dbParts['port'] . ";dbname=" . ltrim($dbParts['path'], '/');
    $username = $dbParts['user'];
    $password = $dbParts['pass'];

    // Create a PDO instance
    $base = new PDO($dsn, $username, $password);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connexion reussie <br>";
    return $base;
}

function getAllArticles($base)
{
    $sql = "SELECT * FROM billet ORDER BY date_creation, Id_billet DESC";
    $resultat = $base->query($sql);
    return $resultat;
}

function getRowNumber($base, $Id_billet)
{
    $sql = "SELECT * FROM commentaire WHERE Id_billet = ?";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($Id_billet));
    return $resultat->rowCount();
}

function getFirstArticles($base)
{
    $sql = "SELECT * FROM billet ORDER BY date_creation, Id_billet DESC LIMIT 4";
    $resultat = $base->query($sql);
    return $resultat;
}

function getArticle($Id_billet, $base)
{
    $sql = "SELECt * FROM billet WHERE Id_billet = ?";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($Id_billet));
    return $resultat->fetch();
}

function getFirstComments($Id_billet, $base)
{
    $sql = "SELECT * FROM commentaire WHERE Id_billet = ? ORDER BY date_creation DESC, Id_commentaire DESC LIMIT 5";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($Id_billet));
    return $resultat;
}

function setComment($auteur, $comment, $Id_billet, $base)
{
    $sql = "INSERT INTO commentaire(Id_billet, auteur, commentaire) VALUES(?, ?, ?)";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($Id_billet, $auteur, $comment));
}
