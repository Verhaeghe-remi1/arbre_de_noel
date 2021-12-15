<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/signin.css">
    <link rel="stylesheet" href="../src/css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Messa Sign In</title>
</head>

<body>

    <?php
        require '../src/php/database.php';

        $nameError = $lastnameError = $mailError = $passwordError = $yourgiftError = $name = $lastname = $mail = $password = $yourgift = "";

        if(!empty($_POST))
        {
            $name               = checkInput($_POST['name']);
            $lastname           = checkInput($_POST['lastname']);
            $mail               = checkInput($_POST['email']);
            $password           = checkInput($_POST['password']); 
            $yourgift           = checkInput($_POST['yourgift']);
            $isSuccess          = true;
    
            if(empty($name)) 
            {
                // $nameError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            }
            if(empty($lastname)) 
            {
                // $descriptionError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            } 
            if(empty($mail)) 
            {
                // $priceError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            } 
            if(empty($password)) 
            {
                // $categoryError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            }
            if(empty($yourgift)) 
            {
                // $categoryError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            }            
            if($isSuccess) 
            {
              
                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO users (name,lastname,mail,password,gift) values(?, ?, ?, ?, ?)");
                $statement->execute(array($name,$lastname,$mail,$password,$yourgift));
                Database::disconnect();
                header("Location: index.php");
            }
        }

        function checkInput($data)
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
    ?>

    <div class="wrapper">
        <div class="title">
            <p>Inscrivez-vous</p>
        </div>
        <form action="index.php" role="form" method="post" enctype="multipart/form-data">
            <div class="formGroupe">
                <label for="name">Votre Prénom</label>
                <input type="text" id="name" name="name" placeholder="Exemple : Denis">
            </div>
            <div class="formGroupe">
                <label for="lastname">Votre Nom</label>
                <input type="text" id="lastname" name="lastname" placeholder="Exemple : Leloire">
            </div>
            <div class="formGroupe">
                <label for="email">Votre Email</label>
                <input type="mail" id="email" name="email" placeholder="Exemple : denis.leloire@gmail.com">
            </div>
            <div class="formGroupe">
                <label for="password">Votre Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Exemple : Denis.4848-">
            </div>
            <div class="formGroupe">
                <label for="yourgift">Votre Cadeaux</label>
                <input type="text" id="yourgift" name="yourgift" placeholder="Exemple : 6 mois abonement crunchyroll">
            </div>
            <div class="formGroupe submitCBtn">
                <div>
                    <input type="submit" id="submitBtn" value="Inscription">
                </div>
            </div>
        </form>
    </div>

</body>



</html>