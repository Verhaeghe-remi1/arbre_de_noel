<?PHP
//require
require "ressources.php";
//connection
$mysqli = new mysqli($servername, $username, $password, $database);
//controle_connection
if ($mysqli->connect_errno) print "Echec connexion MySQL<br> \n";
else                        print "DT prête <br>\n"; 
//
 
$query = "select * from participants";
$res = $mysqli->query($query);
$total = mysqli_num_rows($res);
$tableau = [];
if($total > 0) {
    
    while($ligne = $res->fetch_assoc()){
        $nom = $ligne['nom'];
        $tableau [] = $nom;
        
    }
        
}
$mysqli->close();

         $tableau_melange = $tableau;
         $res = []; 
         shuffle($tableau_melange);
         shuffle($tableau);
         while ( count($tableau_melange) )
         {
         while(  $tableau_melange[0] == $tableau[0] )
            shuffle($tableau_melange);
        $res[ $tableau_melange[0] ] = $tableau[0];
        //print( $tableau_melange[0]." donne à ".$tableau[0]." <br>");
        array_shift($tableau_melange);
        array_shift($tableau);
         }
         
         print( json_encode( $res ) );
?>
