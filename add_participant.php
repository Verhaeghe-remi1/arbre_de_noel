<?php
require_once "ressources.php";
require_once "fonctions.php";



// affiche participant 



// inscrire un participant 

if ($_POST) {
    $nom = $_POST['nom'];
    $query  = "insert into participants (nom) values ( '$nom' );";
    $res = query($query);
    if ($res)
        print("<h3> $nom enregistré</h3>\n");
    else
        print("<h3>nom déjà utilisé</h3>\n");

    }
?>
<form action="#" method="POST">
    <input placeholder="nom" name="nom" id='input' onkeyup='javascript:isCharSet()' />
    <br>
    <button id='button'>Ajoute Participant</button>
</form>
<script type="text/javascript">


    let input = document.getElementById('input');
    let btn = document.getElementById('button');

    btn.disabled = true;


function isCharSet() {
 
  if (input.value != "") {
    btn.disabled = false;
  } else {
    btn.disabled = true;
  }  
}
</script>
