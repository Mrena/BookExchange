<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("DA/authenticationDA.php");
class Authentication
{
    private $f_name;
    private $l_name;
    private $username;
    private $password;
    private $email_address;
    private $reg_type; // 1 for Seller, 0 for Buyer   
    
  
    
    public function _construct()
    {
        $this->username = "";
        $this->password = "";
    }
    

    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    
    public function setPassword($password)
    {
        $this->password = $password; 
    }
    
    public function getEmailAddress()
    {
        return $this->email_address;
    }
    
    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;
        
    }
    
    public function getRegType()
    {
        return $this->reg_type;
    }
    
    
    public function register($f_name,$l_name,$username,$password,$email_address)
    {
      //$reg_type === "Buyer" ? $reg_type = 0 : $reg_type = 1;
       $obj = new AuthenticationBL();
       
      $exists = $obj->validateUser($username, $password);
        if($exists)
        {
            echo "Username already exists";
        }
        else
        {
            
            if($obj->register($f_name,$l_name,$username,$password,$email_address))
            {
              $_SESSION["username"] = $username;
              $_SESSION["password"] = $password; 
              header("location:home.php");  
            }
        else 
            {
            echo "User could not be registered";
            }
        }
    }
    
    public function login($username,$password)
    {
       /*$username = $this->getUsername();
       $password = $this->getPassword();*/
        
       $obj = new AuthenticationBL();
       
      $exists = $obj->validateUser($username, $password);
      if($exists)
      {
          $_SESSION["username"] = $username;
          $_SESSION["password"] = $password;
          header("location:home.php");
      }
      else
          echo "Incorrect username or password";
      
        
    }
    
    public function logout()
    {
        session_destroy();
        
    }
    
    
     public function recoverPasswordBy($emailAddress)
    {
        $objAuth = new AuthenticationBL();
        $password = $objAuth->getPassword($emailAddress);
        $this->sendPasswordByEmail($emailaddress,$password);
        
    }
    
    public function recoverPasswordByNumber($phoneNumber)
    {
        
        $objAuth = new AuthenticationBL();
        $password = $objAuth->getPassword($phoneNumber);
        $this->sendPasswordByEmail($phoneNumber,$password);
    }
    
    private function sendPasswordByEmail($emailaddress,$password)
    {
        if(mail($emailaddress, "Email Recovery from BookExchange", "Here is your password, for logging in to BookExchange: ".$password))
                echo "Password successfully sent";
        
    }
    
    private function sendPasswordBySMS($phoneNumber,$password)
    {
        
        
    }
    
    
}
?>
