<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Contacts</title>
</head>
<body>
    <h1>List of Contacts</h1>

    <?php
    //Step1 - Connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558', 'IWrvd53ZK3');

    //Step2 - create the SQL command
    $sql = "SELECT * FROM contacts";

    //Step3 - prepare the sql command (prevent SQL injection)
    $cmd = $conn->prepare($sql);

    //Step4 - execute the command
    $cmd->execute();

    //Step5 - store the results
    $contacts = $cmd->fetchAll();

    //Step6 - remove the DB connection
    $conn = null;

    //Step7 - loop over the results and display them to screen
    echo '<table><tr><th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                 </tr>';
    foreach($contacts as $contact)
    {
      echo '<tr><td>'.$contact['firstName'].'</td>
                <td>'.$contact['lastName'].'</td>
                <td>'.$contact['email'].'</td></tr>';
    }
    ?>
</body>
</html>
