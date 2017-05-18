<!DOCTYPE html>
<html lang=""en">
<head>
    <meta charset="UTF-8">
    <title>Save Contact</title>
</head>
<body>
<h1>Saving Contact...</h1>

<?php
$firstName = $_POST['firstName'];
echo 'First Name: ' . $firstName . '<br/>';

$lastName = $_POST['lastName'];
echo 'Last Name: ' . $lastName . '<br/>';

$email = $_POST['email'];
echo 'Email: ' . $email . '<br/>';

//Lets connect to the DB and save our file
//Step1 - Connect to the DB
$conn = new PDO( 'mysql:host=localHost;dbname=php', 'root', 'admin');
$conn->setAttribute(PDO::ATTR_ERRMODE,);
//Step2 - create a SQL command
$sql = "INSERT INTO contacts (firstName, lastName, email)
VALUES(:firstName, :lastName, :email)";
//Step3 - "prepare" the command to prevent SQL injection attacks
$cmd = $cnn->prepare($sql);
$cmd-> bindParam(':firstName', $firstName, PDO::PARAM_STR, 30);
$cmd-> bindParam(':lastName', $lastName, PDO::PARAM_STR, 30);
$cmd-> bindParam(':email', $email, PDO::PARAM_STR, 120);
//Step4 - execute the SQL command
$cmd->execute();
//Step5 - close the connection to the DB

//Step6 - redirect to a new page
?>
</body>
</html>