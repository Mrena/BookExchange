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
    </head>
    <body>
        <div id="page">
            <header><h1>Profile</h1></header>
        <?php
        // put your code here
        require_once 'Seller.php';
        require_once 'Book.php';
        include_once 'includes/search.php';
        include_once 'includes/menu.php';
        
        if(isset($_GET['user']))
        {
            $user = $_GET['user'];
            $objSeller = new Seller();
            $objSeller->getSellerByUsername($user);
            
            
        }
        ?>
            <?php
            include_once 'includes/searchlogic.php';
            ?>
            <footer><?php include_once 'includes/footer.php'; ?></footer>
           <script src="js/jquery-1.8.3.min.js"></script>
         <script src="js/search.js"></script>  
         <script type="text/javascript" src="js/effect.js"></script>
         <script>
         
     </script>
        </div>
    </body>
</html>
