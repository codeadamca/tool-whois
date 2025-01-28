<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if(isset($_GET['error'])): ?>
    
        <p>There was an error with the provided domain.</p>

    <?php elseif(isset($_GET['api'])): ?>
    
        <p>There was an error with the WHOIS lookup.</p>

    <?php endif; ?>

    <form method="post" action="whois.php">

        <input type="text" name="domain" placeholder="codeadam.ca">
        <input type="submit" value="WHOIS">

    </form>
    
</body>
</html>