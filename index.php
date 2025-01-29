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

        <?php if(isset($_GET['error'])): ?>
        
            <p>There was an error with the provided domain.</p>

        <?php elseif(isset($_GET['api'])): ?>
        
            <p>There was an error with the WHOIS lookup.</p>

        <?php endif; ?>

        <form method="post" action="whois.php" autocomplete="off">

            <input type="text" 
                name="domain" 
                placeholder="codeadam.ca" 
                class="w3-input w3-margin-bottom"
                autocomplete="off"
            >
            <input type="submit" value="SUBMIT" class="w3-button" style="background-color: var(--ca-red);">

        </form>

    </div>
    
    <script
      src="https://kit.fontawesome.com/57a8a8c892.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>