<?php
    // creer un table nom et pw

    // connecter à votre DB

    require "ressources.php";
    require_once "fonctions.php";
    $mysqli = new mysqli($servername, $username, $password, $database);

    // forger la requete
    $query  = "select * from utilisateur;";
    //print( "<select name='pseudo'>\n");
    //print( $query."<br>");
    $res = $mysqli->query( $query );

    while(  ($ligne = $res->fetch_assoc()) )
    {
        $pseudo = $ligne[ 'pseudo' ];
        $id = $ligne[ 'id' ];
        print( "<option value=$id>$pseudo</option>\n" );
    }
    $mysqli->close();
    print( "</select>\n");


?>