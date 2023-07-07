

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $nombreAleatoire = rand(1, 100);
    echo $nombreAleatoire;

        include_once "fonctionSQL.php";
        include_once "fonctionTABLE.php";
        
         $rows = getAllsUsers();
         afficherTable($rows, getHeaderTable());

        
        
    ?>
</body>
</html>
