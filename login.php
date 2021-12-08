<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


    if ($_GET)
    {
        $nom = $_GET[ 'nom' ];
        $pw = $_GET[ 'pw' ];

       // $pw = md5( $pw );

        require_once "ressources.php";
        $mysqli = new mysqli($servername, $username, $password, $database);
        
        $query  = "select users.nom as nom
        from users
        where users.nom='$nom' and users.pw='$pw';";
        
        //print( $query );
        if ( $res = $mysqli->query( $query ))
        {
            if ( $res->num_rows == 0 )
                print( "<h3>non incrit $nom</h3>");
            else
                while( $ligne = $res->fetch_assoc() )
                {
                    $nom = $ligne[ "nom"];
                    
                    print( "<h3>bienvenue $nom</h3>");
                }
        }
        else
            print( "<h3>erreur </h3>");

        $mysqli->close();
    }
?>


<form action="#" method="get"> 
<input type="text" name='nom' placeholder="login">
<br>
<input type="text" name='pw' placeholder="pw">
<br>
<button type="submit">OK</button>
</form>
</body>
</html>