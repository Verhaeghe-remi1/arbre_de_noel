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
         $tableau_melange = $tableau; 
         shuffle($tableau_melange);
         $result = array_combine($tableau, $tableau_melange);
         $mysqli->close();
         
    print( json_encode( $result ) );
?>
