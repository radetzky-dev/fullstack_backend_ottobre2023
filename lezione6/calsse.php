<?php



class Fruit {
    // Properties
    public $name;
    public $color;
  
    function test()
    {
        echo "test";
    }
    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
  }

  $banana = new Fruit();
  $banana->test();

