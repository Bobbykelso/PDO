<?php

require_once "connec.php";

$pdo = new \PDO(DSN , USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();


if (!empty($_GET) && !isset($_GET['submit'])) {


$data = array_map('trim', $_GET);
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$errors = [];

if (empty($firstname)) {
    $errors[] = 'Le prénom est requis';
 }
 if (empty($lastname)) {
    $errors[] = 'Le nom est requis';
 }
 if (strlen($firstname)>45){
    $errors[]= "Le nom est trop long";
}
if (strlen($lastname)>45){
    $errors[]= "Le prénom est trop long";
}

 if (empty($errors)) {

    $query = "INSERT INTO friend (`lastname`, `firstname`) VALUES (:lastname,:firstname)";

    $statement = $pdo->prepare($query);
    $statement->bindValue(":lastname", $lastname);
    $statement->bindValue(":firstname", $firstname);
    $statement->execute();

    header('Location:index.php');
 } 
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