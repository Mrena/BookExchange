<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>@import url("css/main.css");</style>
        
        <?php
        
        require_once 'Seller.php';
        require_once 'Book.php';
        
        
        
        ?>
        
    </head>
    
    <body>
        <div id="page">
        <header><h1>Home</h1> </header>
      
        <?php
        include_once 'includes/logged.php';
       
        include_once 'includes/search.php';
        include_once 'includes/menu.php';
        // put your code here
          
        
        
        
        include_once 'includes/searchlogic.php';
        ?>
        <div id="intro">
           hello 
        </div>
        
        <footer><?php include_once 'includes/footer.php'; ?> </footer>
        </div>
        
        <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/search.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <script>
       
           


  
 

    </script>
    </body>
</html>
