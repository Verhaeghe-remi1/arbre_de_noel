
   
<?PHP
//require
require "ressources.php";
//connection
$mysqli = new mysqli($servername, $username, $password, $database);
//controle_connection
if ($mysqli->connect_errno) print "Echec lors de la connexion à MySQL<br> \n";
else                        print "Base de données prête <br>\n"; 
//
 
$query = "select * from participants";
$result = $mysqli->query($query);
$total = mysqli_num_rows($result);
$tableau_non_melanger = [];
if($total > 0) {
    while($row = mysqli_fetch_array($result)){
        $nom_non_melanger = $row['nom'];
        $tableau_non_melanger[] = $nom_non_melanger;
    }
}
//

$query = "select * from participants";
$result = $mysqli->query($query);
$total = mysqli_num_rows($result);
$tableau_melanger= [];
if($total > 0) {
    while($row = mysqli_fetch_array($result)){
            $nom_melanger = $row['nom'];
            $tableau_melanger[] = $nom_melanger;
    }
         
}

shuffle($tableau_melanger);
$c = array_combine($tableau_non_melanger, $tableau_melanger,);

print_r($c);
       

?>
