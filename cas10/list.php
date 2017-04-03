<?php
require 'fakultet.php';
use Fakulteti\Fakultet;

$fakulteti = Fakultet::readAll();

?>
<html>
    <head>
        <title>List Faculties</title>
    </head>
    <body>
        <ul>
            <?php 
            foreach($fakulteti as $fakultet) {
                echo "<li>{$fakultet[0]}. {$fakultet[1]}</li>";
            }
            ?>

        </ul>

    </body>
</html>
