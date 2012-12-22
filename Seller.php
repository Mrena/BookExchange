<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Authentication.php';
require_once 'DA/SellerDA.php';
class Seller extends Authentication
{
    private $name;
    private $email_address;
    private $phone_number;
    private $physical_address;
    private $service_code;
    
    public function _construct()
    {
        
        
    }
    
    public function getSellerByUsername($username)
    {
        $objSellerDA = new SellerDA();
     $result = $objSellerDA->getSellerByUsername($username);
     if($result!=false)
     {
         while ($row = mysql_fetch_array($result)) {
             
             $f_name = $row[0];
             $l_name = $row[1];
             $serviceCode = $row[6]; 
             
             echo "<table class='text'>";
             echo "<tr><td>First Name:</td><td>$f_name</td></tr>";
             echo "<tr><td>Last Name:</td><td>$l_name</td></tr>";
             echo "<tr><td>Service Code:</td><td>$serviceCode</td></tr>";
             echo "</table>";
             
         } 
     }
     else
     {
         
     }
        
    }
    
    public function UpdateInfo($name,$physical_address,$phone_number,$email_address)
    {
       $this->name = $name;
       $this->email_address = $email_address;
       $this->phone_number = $phone_number;
       $this->physical_address = $physical_address;
        
    }
    
   
    
    
    
    
  
    
   
    
    
    
}
?>
