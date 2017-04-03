<?php
require 'fakultet.php';
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    if(trim($name) != ""){
        $fakultet = new \Fakulteti\Fakultet($name);
        $fakultet->save();
    }
 
}else {
        $names = ['Feit', 'Finki', 'SEDC'];
        foreach ($names as $name) {
            $fakultet = new \Fakulteti\Fakultet($name);
            $fakultet->save();
        }
    }

?>