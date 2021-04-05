<?php

require_once "connec.php";

$pdo = new \PDO(DSN , USER, PASS);



$data = array_map('trim', $_GET);
//Variables
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$errors = [];

if (empty($firstname)) {
    $errors[] = 'Le prénom est requis';
 }
 if (empty($lastname)) {
    $errors[] = 'Le nom est requis';
 }

 if (!empty($errors)) {
    for($i=0;$i< count($errors);$i++) {
      echo $errors[$i]. "<br>";
    }
  } else {
    echo "<br>Merci $lastname $firstname pour votre ajout.</br>" ;
  }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="get">
        <div class="mb-3">
            <label for="firstname">Firstname :</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div class="mb-3">
            <label for="lastname">Prènom :</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
    
        <div class="button" class="mb-3">
            <button type="submit">Enregistrer</button>
        </div>
    </form>
</body>

</html>