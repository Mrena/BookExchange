<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellerDA
 *
 * @author Mrena
 */
require_once 'Connector.php';
require_once 'SQLException.php';
class SellerDA extends Connector {
    //put your code here
    private $connector;
    
    
    public function _construct()
    {
        $this->connect();
        
    }
    
    public function getSellerByUsername($username)
                {
        $this->connect();
        $query = "SELECT * FROM Users WHERE username='$username'";
        if($result = $this->runSelectQuery($query))
              return $result;
          else 
              throw new SQLException();
          
        
                }
                
                
    
}

?>
