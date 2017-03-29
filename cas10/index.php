<?php

class Student {
    var $firstName;
    var $lastName;
    var $subjects;
    var $dob;
    
    function __construct($firstname, $lastname, $subjects){
        echo "Constructor called <br>";
        $this->firstName = $firstname;
        $this->lastName = $lastname;
        $this->subjects = $subjects;
    }
    
    function __destruct(){
        echo "Destructor called <br>";
    }
    function intro() {
        echo "I am {$this->firstName} {$this->lastName}"
        . implode(",", $this->subjects)
        . "<br>";
        
    }
}
    $student1 = new Student ("Emilija", "Talevska", ['Php', 'MySQLI', 'Javascript']);
//    $student1->firstName = "Emilija";
//    $student1->lastName = "Talevska";
//    $student1->subjects = ['Php', 'MySQLI', 'Javascript'];
      $student1->intro();
    
    $student2 = new Student ("John", "Doe", ['Math', 'Physics', 'Javascript']);
//    $student2->firstName = "John";
//    $student2->lastName = "Doe";
//    $student2->subjects = ['Math', 'Physics', 'Javascript'];
      $student2->intro();
      
    // destroy objects //
    unset($student1, $student2);
    
?>