<?php

// mmm yes a class
class Pokemon {
    public $name;

    function __contruct($givenName){
        // the arrow is like a dot in java (PHP syntax is so weird)
        // this.name = givenName;
        $this->name = $givenName; 
    }

    function talk() {
        // you always have to use $this for some reason
        echo $this->name . "!!";
    }

}

?>