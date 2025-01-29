<?php

// Initialize a session
session_start();

// Move session data to variables and filter API data to response
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
    <title>WHOIS | CodeAdam</title>

    <link
      href="https://fonts.googleapis.com/css?family=Lora"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

    <link rel="stylesheet" href="https://cdn.codeadam.ca/tools@1.0.0/w3.css" />
</head>
<body>


    <div class="w3-container w3-margin-top w3-center" style="max-width: 400px; margin: auto;">

        <a href="/">
            <img src="https://cdn.codeadam.ca/images@1.0.0/codeadam-logo-coloured.png" width="80">
        </a>

        <h1>WHOIS</h1>
    
        <h2><?=strtolower($domain);?></h2>

        <div class="w3-left-align">
                
            <hr>

            <h3>Name Servers</h3>

            <p>
                <?php foreach($response['Name Server'] as $server): ?>
                    <?=$server?>
                    <br>
                <?php endforeach; ?>
            </p>

            <hr>

            <h3>Domain Details</h3>

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

            <hr>
            
        </div>

        <a href="/">Lookup Another Domain</a>
    
    </div>
    
    <script
      src="https://kit.fontawesome.com/57a8a8c892.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

