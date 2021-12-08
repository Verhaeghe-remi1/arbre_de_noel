<?php
    require_once "ressources.php";
    $mysqli = new mysqli($servername, $username, $password, $database);
    
    $reponse = [];
    $query  = "select * from participants;";
    $res = $mysqli->query( $query );
    while( $ligne = $res->fetch_assoc() )
    {
        $nom = $ligne[ "nom"];
        $reponse[] = $nom;
    }
    $mysqli->close();


    print(  json_encode( $reponse )  );
?>
