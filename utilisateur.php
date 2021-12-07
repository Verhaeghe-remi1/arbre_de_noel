<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>utilisateur</title>
</head>

<body background="noel.gif">
    

<?php

require_once "ressources.php";
require_once "fonctions.php";

    if ($_GET)
    {
        $nom             = $_GET[ 'nom' ];
        $prenom          = $_GET[ 'prenom' ];
        
        

        //$pw = md5( $pw );

        $mysqli = new mysqli($servername, $username, $password, $database);
        //insert into users ( nom, pw, idDep ) values( "Zorro", "zora", 22 );

        // insert into emprunteurs ( nom, pw, dateNaiss, civil ) values ( "Zorro", "123", '1955-07-14', 2 );
        $query  = "insert into utilisateur ( nom, prenom ) values ( '$nom', '$prenom' );";
        //print( $query );
        if ( $mysqli->query( $query ) )
            print( "<h3>$nom vous etes bien inscrit</h3>");
        else
            print( "<h3>erreur d'inscription</h3>");
        $mysqli->close();
    }
?>


<form action="#" method="get">
    
<input type="text" name='nom' placeholder="nom">
<br>
<input type="text" name='prenom' placeholder="prenom">
<br>

<button type="submit">OK</button>
</form>
</body>
</html>