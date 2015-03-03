<?php

class Connection {

    private static $connection = NULL;

    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database

            $host = "daneel"; //this is the host server name, that permits us to connects to the database
            $database = "N00127774";
            $username = "N00127774";
            $password = "N00127774";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }

        return Connection::$connection;
    }

}
