<?php

    require '../src/php/database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $nameError = $lastnameError = $mailError = $passwordError = $yourgiftError = $name = $lastname = $mail = $password = $yourgift = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $lastname        = checkInput($_POST['lastname']);
        $mail              = checkInput($_POST['email']);
        $password           = checkInput($_POST['password']); 
        $yourgift              = checkInput($_POST["yourgift"]);

        $isSuccess          = true;
       
        if(empty($name)) 
        {
            $isSuccess = false;
        }
        if(empty($lastname)) 
        {
            $isSuccess = false;
        } 
        if(empty($mail)) 
        {
            $isSuccess = false;
        } 
         
        if(empty($password)) 
        {
            $isSuccess = false;
        }

        if(empty($yourgift)) 
        {
            $isSuccess = false;
        }
         
        if ($isSuccess) 
        { 
            $db = Database::connect();
           
            $statement = $db->prepare("UPDATE users set name = ?, lastname = ?, mail = ?, password = ?, gift = ? WHERE id = ?");
            $statement->execute(array($name,$lastname,$mail,$password,$yourgift,$id));
            
            Database::disconnect();
            header("Location: admin.php");
        }
    }
    else
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM users where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name           = $item['name'];
        $lastname    = $item['lastname'];
        $mail          = $item['mail'];
        $password       = $item['password'];
        $yourgift          = $item['gift'];
        Database::disconnect();
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Messa edit</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
         <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Modifier un item</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'edit.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">                            
                            <label for="lastname">Changer le nom</label>
                            <input type="text" id="lastname" name="lastname" placeholder="<?php echo $lastname;?>" value="<?php echo $lastname;?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Changer le prénom</label>
                            <input type="text" id="name" name="name" placeholder="<?php echo $name;?>" value="<?php echo $name;?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Changer le email</label>
                            <input type="mail" id="email" name="email" placeholder="<?php echo $mail;?>" value="<?php echo $mail;?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Changer le mot de passe</label>
                            <input type="password" id="password" name="password" placeholder="<?php echo $password;?>" value="<?php echo $password;?>">
                        </div>
                        <div class="form-group">
                            <label for="yourgift">Changer le cadeaux</label>
                            <input type="text" id="yourgift" name="yourgift" placeholder="<?php echo $yourgift;?>" value="<?php echo $yourgift;?>">
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="admin.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
            </div>
        </div>   
    </body>
    
</html>