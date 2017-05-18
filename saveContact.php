<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Contact</title>
</head>
<body>
    <h1>Saving Contact....</h1>

    <?php
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        echo 'First Name: ' . $firstName . '<br />';
        echo 'Last Name: ' . $lastName . '<br />';
        echo 'Email: ' . $email;

        //Let's connect to the DB and save our file
        //Step 1 - connect to DB
        //$conn = new PDO('mysql:host=localhost;dbname=php', 'root', '');
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558', 'IWrvd53ZK3');

        //Step 2- create SQl command
        $sql = "INSERT INTO contacts (firstName, lastName, email)
                VALUES (:firstName, :lastName, :email)";

        //Step 3 - "preapare the command to prevent SQL injection attacks
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 30);
        $cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 30);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);

        //Step 4 - execute the SQL command
        $cmd->execute();

        //Step 5 - close the command to the DB
        $conn = null;

        //Step 6 - redirect to a new page

    ?>
</body>
</html>
