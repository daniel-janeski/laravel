<?php

class Student {
    var $firstName;
    var $lastName;
    var $subjects;
    private $dob;
    private $email;
    
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
        function getEmail () {
            return $this->email;
        }
        function setEmail ($email) {
            // validation
            if(preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\._]*@[a-zA-Z]+\.[a-z]{2,3}(\.[a-z]{2,3})?$/', $email)) {
                $this->email = $email;
            }
        }
}
    $student1 = new Student ("Emilija", "Talevska", ['Php', 'MySQLI', 'Javascript']);
//    $student1->firstName = "Emilija";
//    $student1->lastName = "Talevska";
//    $student1->subjects = ['Php', 'MySQLI', 'Javascript'];
     //not valid
      //$student->dob ='01.01.2000';
    $student1->setEmail('e.talevska@hotmail.com');
    echo $student1->getEmail();
    $student1->intro();
    
    $student2 = new Student ("John", "Doe", ['Math', 'Physics', 'Javascript']);
//    $student2->firstName = "John";
//    $student2->lastName = "Doe";
//    $student2->subjects = ['Math', 'Physics', 'Javascript'];
      $student2->intro();
      
    // destroy objects //
    unset($student1, $student2);
    
?>