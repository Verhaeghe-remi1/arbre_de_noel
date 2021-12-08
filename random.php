
   
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
      
        print( "<table>\n");
            

             foreach( $result as $key => $values )
                 {  print( "<tr>\n" );
                    print("<td>\n" );
                    print( $key  );
                 print("</td>\n" );
                 print("<td>\n" );
                    print( "donne son cadeau à  " );
                 print("</td>\n" );
                 print("<td>\n" );
                    print( "" );
                 print("</td>\n" );
                 print("<td>\n" );
                     print( $values  );
                 print("</td>\n" );
                print( "</tr>\n" );
                }
            
         print( "</table>\n");
         print( "<br><br>");
 

         $mysqli->close();
         




       

?>
