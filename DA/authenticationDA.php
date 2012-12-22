<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authenticationBL
 *
 * @author Mrena
 */
require_once("Connector.php");
require_once 'SQLException.php';
class AuthenticationBL extends Connector
{
    //put your code here
    
 private $conn;
 private $db = "BookExchange";
 
 public function getConnectionString()
 {
     return $this->conn;
 }
    
 public function getBDName()
 {
     
     
 }
 
 public function setDBName($dbName)
 {
     $this->db = $dbName;
 }
 
 public function validateUser($username,$password)
 {
     $obj = new Connector();
    
     
     if($obj->connect())
     {
         $obj->selectDB($this->db);
         $query = "SELECT username,password FROM Users WHERE username='$username' AND password='$password'";
         $result = $obj->runSelectQuery($query);
         if($result!=null && $row = mysql_fetch_array($result))
         {
             return true; // The user exists
         }
         else
             return false; // The user does not exists 
         
     }
 }
 public function register($f_name,$l_name,$username,$password,$email_address)
         {
     
     
     $obj = new Connector();
     $obj->connect() ? "" : die("User could not registered".  mysql_error());
     $obj->selectDB($this->db);
     $query = "INSERT INTO Users (f_name,l_name,username,password,email_address) VALUES('$f_name','$l_name','$username','$password','$email_address')";
     if($obj->runQuery($query))
     {
         return true; // User registered
     }
     else
        throw new SQLException();
     
         }
 public function getPassword($emailAddress)
 {
     $objConnector = new Connector();
     $this->connect();
     $this->selectDB($this->db);
     $query = "SELECT password FROM Users WHERE email_address='$emailAddress' LIMIT 1";
     if($result = $this->runSelectQuery($query))
     {
         $row = mysql_fetch_array($result);
         return $row[3]; // password at index 3
     }
           else
               throw new SQLException();
     
 }
}
?>
