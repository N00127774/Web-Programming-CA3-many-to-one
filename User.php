<?php

// The Class User, as two instances, username and password
class User {

    private $username;
    private $password;

    // this is the constructor for the instances above.
    public function __construct($u, $p) {
        $this->username = $u;
        $this->password = $p;
    }

    //The get method retrives the input from the instances, then outputs it.
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

}
