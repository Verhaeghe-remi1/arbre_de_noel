<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>utilisateur</title>
</head>

<style> 
body
{ 
    color : white;
} 
</style>

<body background="noel.gif">
    

<?php

require_once "ressources.php";
require_once "fonctions.php";

    if ($_GET)
    {
        $pseudo             = $_GET[ 'pseudo' ];
    
        //$pw = md5( $pw );

        $mysqli = new mysqli($servername, $username, $password, $database);
        //insert into users ( nom, pw, idDep ) values( "Zorro", "zora", 22 );

        // insert into emprunteurs ( nom, pw, dateNaiss, civil ) values ( "Zorro", "123", '1955-07-14', 2 );
        $query  = "insert into utilisateur ( pseudo ) values ( '$pseudo' );";
       // print( $query );
        if ( $mysqli->query( $query ) )
            print( "<h3>$pseudo vous êtes bien inscrit</h3>");
        else
            print( "<h3>erreur d'inscription</h3>");
        $mysqli->close();
    }
?>


<form action="#" method="get">
    
<input type="text" name='pseudo' placeholder="pseudo">
<br>

<button type="submit">OK</button>
</form>
</body>
</html>