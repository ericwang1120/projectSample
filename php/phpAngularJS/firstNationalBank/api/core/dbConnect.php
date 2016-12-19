<?php
/**
 * 159339Assignment2
 * XIN WANG 15397438
 */

class dbConnect {

    private $conn;

    function __construct() {
    }

    /**
     * Establishing database connection
     * @return mysqli connection handler
     */
    function connect() {
        include_once ROOT_PATH.DS.'config.php';

        // Connecting to mysql database
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Check for database connection error
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // returing connection resource
        return $this->conn;
    }

}


