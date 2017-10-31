<?php
class sql{ // Class to mysqli functions

  var $server           = ""; // Server address
  var $username         = ""; // MySQL login username
  var $password         = ""; // MySQL login password

  var $errorCount       = 0; // Class wide int error count variable
  var $errors           = array(); // Array of all class wide errors

  var $conn; // Class wide MySQL connection object

  function connect($database = false){
    if($database != false){ // When a database has been specified
      $c = mysqli_connect($this->server, $this->username, $this->password, $database); // Connect to MysQL server and select the supplied database
    }else{ // When no database has been supplied
      $c = mysqli_connect($this->server, $this->username, $this->password); // Connect to MySQL server. Select the database later
    }
    if(mysqli_connect_errno() > 0){ // When an error has occured
      $this->errorCount++; // Add error int to class wide error count variable
      $this->$errors[] = mysqli_connect_error(); // Add error text to the class wide error array variable
      return false; // Return false
    }else{ // Connection to MySQL database has been successful
      $this->conn = $c; // Save class wide connection variable to MySQL connection result
      return $c; // Return the connection result
    }
  }function query($sql){ // Send any SQL query to the connected server
    if (!$this->conn) { // If the class has not been connected
      $this->connect(); // Connect to the default MySQL server
    }
    $r = mysqli_query($this->conn, $sql); // Send the MySQL query to the connected server
    if(mysqli_errno($this->conn) > 0){ // If the query to the MySQL server has returned errors
      $this->errorCount++; // Add error int to class wide error count variable
      $this->errors[] = mysqli_error($this->conn); // Add error text to the class wide error array variable
      return false; // Return false
    }else{ // If there were no errors
      return $r; // Return the MySQL resutl sent back from the server
    }
  }
}

?>
