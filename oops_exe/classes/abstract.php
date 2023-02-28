<?php
abstract class Person{
    public $name;
    public $age;
    public $gender;

    public function __construct($name, $age, $gender) {
        if(!isset($name) && empty($name)) return "Please enter name";
        $this->name = $name;
        if(!isset($age) && empty($age)) return "Please enter age";
        $this->age = $age;
        if(!isset($gender) && empty($gender)) return "Please enter gender";
        $this->gender = $gender;
      }

       public function greet($name){
        return "Hello".$this->name;
      }
}