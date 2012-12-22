<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Connector
{
protected $con;
private $server;
private $sUsername;
private $sPassword;
private $db; 



public function _construct()
{
$this->server = "localhost";
$this->sUsername = "root";
$this->sPassword = "";
$this->db="bookexhange";


    
}

protected function connect()
            {
    
   $this->con = mysql_connect("localhost","root","");
   mysql_select_db("bookexchange", $this->con);
   if($this->con)
       return true;
   else
       return false;
   
    
            }  
            
  protected function selectDB($dbName)
  {
      mysql_select_db($dbName);
         
  }
            
  protected function runQuery($query)
 {
     if(mysql_query($query,$this->con))
             return true;
         else 
             return false;
     
 }
 
 protected function runSelectQuery($query)
 {
     
     if($result = mysql_query($query,$this->con))
     {
         return $result;
     }
     else
         return false;
             
     
     
 }

 protected function disconnect()
        {
    mysql_close($this->con);
    
        }
}
?>
