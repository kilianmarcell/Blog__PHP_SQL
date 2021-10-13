<?php
require_once 'db.php';
require_once 'Bejegyzes.php';

$bejegyzesek = Bejegyzes::osszes();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <?php
        //var_dump($bejegyzesek); mindent kiír, tesztelésre használjuk
        foreach ($bejegyzesek as $bejegyzes) {
            echo "<article>";
            echo "<h2>" . $bejegyzes -> getDatum() -> format('Y-m-d H:i:s') . "</h2>";
            echo "<p>" . $bejegyzes -> getTartalom() . "</p>";
            echo "</article>";
        }
    ?>
</body>
</html>