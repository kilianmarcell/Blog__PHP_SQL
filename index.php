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
        var_dump($bejegyzesek);
    ?>
</body>
</html>