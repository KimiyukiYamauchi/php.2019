<?php
namespace ITCollege\Lib;

// User
class User {
    // property
    public $name;

    // constructor
    public function __construct($name) {
        $this->name = $name;
    }

    // method
    public function sayHi() {
        echo "hi, i am $this->name!";
    }
}

class AdminUser extends User {
    public function sayHello() {
        echo "hello from Admin!";
    }
    // Override
    public function sayHi() {
        echo "[admin] hi, i am $this->name!";
    }
}
?>
