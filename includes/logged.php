<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_SESSION['username'])) 
        {
        $seller = $_SESSION['username'];
        echo "<p>Logged as <a href='profile.php?user=$seller'>$seller</a></p> ";
        }
        else if(isset($_POST['seller']))
        {
            $seller = $_POST['seller'];
            echo "<p>Logged as <a href='profile.php?$seller'>$seller</a></p> ";
        }
          else
              header("location:index.php");


?>
