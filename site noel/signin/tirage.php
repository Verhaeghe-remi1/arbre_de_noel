<?PHP
//require
require "../src/php/database.php";
//connection
//$mysqli = new mysqli($servername, $username, $password, $database);
//controle_connection
//if ($mysqli->connect_errno) print "Echec connexion MySQL<br> \n";
//else                        print "DT prête <br>\n"; 
//
 
//$query = "SELECT name, lastname FROM `users`;";
//$res = $mysqli->query($query);
//$total = mysqli_num_rows($res);
//$tableau = [];
//if($total > 0) {
    $db = Database::connect();
    $statement = $db->prepare('SELECT name FROM users');
    $statement->execute(array('name'));
                Database::disconnect();
    while($ligne = $statement->fetch()){
        $name= $ligne['name'];
        $tableau[] = $name;
        
    }
        
//}
//$mysqli->close();

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
