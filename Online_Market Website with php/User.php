
<?php

class User {
    protected $id;
    protected $email;
    protected $password;
    protected $name;

    /************************
    /* Constructors
    /******************** */

   function User ($_id, $_email, $_password, $_name) {
        $this->id = $_id;
        $this->email = $_email;
        $this->password = $_password;
        $this->name = $_name;
 
    }

    /************************
      /* Setters
      /******************** */

    function setEmail($_email) {
        $this->email = $_email;
    }

    function setPassword($_password) {
        $this->password = $_password;
    }

    function setName($_name) {
        $this->name = $_name;
    }

    /************************
      /* Getters
      /******************** */

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getName() {
        return $this->name;
    }

    function getId() {
        return $this->id;
    }

}
?>
