<?php

session_start();

$domain = $_SESSION['domain'];
$response = $_SESSION['response'];
$response = $response['data'];
$response = $response[array_key_first($response)];

/*
echo '<pre>';
print_r($response);
echo '<pre>';
die();
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WHOIS Results for <?=strtoupper($domain);?></title>
</head>
<body>
    
    <h1>WHOIS Results for <?=strtoupper($domain);?></h1>

    <h2>Name Servers</h2>

    <p>
        <?php foreach($response['Name Server'] as $server): ?>
            <?=$server?>
            <br>
        <?php endforeach; ?>
    </p>

    <h2>Domain Details</h2>


    <p>
        Registry Domain ID: <?=$response['Registry Domain ID']?>
        <br>
        Registrar WHOIS Server: <?=$response['Registrar WHOIS Server']?>
        <br>
        Registrar URL: <?=$response['Registrar URL']?>
        <br>
        Updated Date: <?=$response['Updated Date']?>
        <br>
        Created Date: <?=$response['Created Date']?>
        <br>
        Expiry Date: <?=$response['Expiry Date']?>
        <br>
        Registrar: <?=$response['Registrar']?>
        <br>
        Registrar IANA ID: <?=$response['Registrar IANA ID']?>
        <br>
        Registrar Abuse Contact Email: <?=$response['Registrar Abuse Contact Email']?>
        <br>
        Registrar Abuse Contact Phone: <?=$response['Registrar Abuse Contact Phone']?>
    </p>

</body>
</html>

