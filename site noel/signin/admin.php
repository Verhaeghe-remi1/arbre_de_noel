<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    
    require '../src/php/database.php';


?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Mot de Passe</th>
      <th scope="col">Cadeau</th>
      <th scope="col">Gestion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">0</th>
      <td>Admin</td>
      <td>Admin</td>
      <td>admin@gmail.com</td>
      <td>admin@admin@admin.001</td>
      <td>none</td>
      <td>
        <div class="panel">
            <a class="btn btn-danger">Supprimer</a>
            <a class="btn btn-primary">Modifier</a>
        </div>
    </td>
    </tr>

    <?php 
        
        $db = Database::connect();
        $statement = $db->query('SELECT users.id, users.name, users.lastname, users.mail, users.password, users.gift FROM users');
        while($item = $statement->fetch()) 
        {
       echo'<tr>';
          echo  '<th scope="row">' . $item["id"] . '</th>';
           echo '<td>' . $item["lastname"] . '</td>';
         echo  '<td>' . $item["name"] . '</td>';
          echo '<td>' . $item["mail"] . '</td>';
          echo  '<td>' . $item["password"] . '</td>';
          echo '<td>' . $item["gift"] . '</td>';

          echo '<td>
                    <div class="panel">
                    <a href="delete.php?id='.$item["id"].'" class="btn btn-danger">Supprimer</a>
                    <a href="edit.php?id='.$item["id"].'"class="btn btn-primary">Modifier</a>

                    </div>
                </td>';

      echo  '</tr>';
        }

    ?>
  
  </tbody>
</table>
    
</body>

</html>