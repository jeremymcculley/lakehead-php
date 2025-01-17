<?php
// To save some time we are going to create a class to hold the database connection information
class Database{
  // A private keyword, as the name suggests is the one that can only be accessed from within the class.
  private $connection;
  // In PHP, $this keyword references the current object of the class.
  function __construct(){
    $this->connect_db();
  }
  public function connect_db(){
    $this->connection = mysqli_connect('localhost', 'root', 'mysql', 'lake_php');
    if(mysqli_connect_error()){
      die("Database connection failed" . mysqli_connect_error() . mysqli_connect_error());
    }
  }
  public function create($fname,$lname,$age,$email){
    $sql = "INSERT INTO phpperson (fname, lname, age, email) VALUES ('$fname', '$lname', '$age', '$email')";
    $res = mysqli_query($this->connection, $sql);
    if($res){
      return true;
    }else{
      return false;
    }
  }
  /*
   * This function has two parameters:
   * the $inputs parameter is an associative array. it can be $_POST, $_GET, or a regular associative array
   * the $fields parameter is an array that specifies a list of the fields with rules.
   * the sanitize() function returns an array that contains the sanitized data
   * */
  public function sanitize($var){
    $return = mysqli_real_escape_string($this->connection, $var);
    return $return;
  }
}
$database = new Database();
?>