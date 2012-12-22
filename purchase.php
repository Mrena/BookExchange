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
            <header><h1>Purchase</h1></header>
        <?php
        // put your code here
        require_once 'Seller.php';
        require_once 'Book.php';
        include_once 'includes/logged.php';
       
        include_once 'includes/search.php';
        include_once 'includes/menu.php';
        
        if(isset($_GET['bookId']))
        {
          $bookId=$_GET['bookId'];  
          $objBook = new Book();
          $objBook->displayBookById($bookId);
        
          echo "<table><tr><td>Quantity:</td><td><select name='quantity' id='quantity'>
                            <option class='quantity1'>Select quantity</option>
                        </select><a href='#' id='next'>Next</a></td></tr>";
          echo "<tr><td><input type='hidden' id='buyer' value='$seller'</td></tr>";
          echo "<tr><td></td><td><input type='button' name='addToCart' id='addToCart' value='Add to cart' /></td></tr>";
        }
        ?>
            <footer><?php 
            require_once 'includes/searchlogic.php';
           // include_once 'includes/footer.php';
            if(isset($_GET['buyer'],$_GET['bookId'],$_GET['quantity']))
            {
                
                
            }
                             
            ?></footer>
        </div>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/search.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <script>
            $(document).ready(function(){
                
                $("#preview").hide();
                
                $("#addToCart").click(function(){
                    var bookId = $("#bookId").html();
                    var quantity = $("#quantity").val();
                    var buyer = $("#buyer").val();
                    
                   
                    window.location = "purchase.php?buyer="+buyer+"&bookId="+bookId+"&quantity="+quantity;
                    
                    
                    
                });
                
                for(var i=1;i<11;i++)
                    $("#quantity").append("<option class='quantity1'>"+i+"</option>");
                
            });
            
            $("#next").click(function(){
                
               var last = parseInt($(".quantity1:last").val());
               $("#quantity").empty();
               last++;
               var lastX10 = last+10;
               for(var i=last;i<lastX10;i++)
                   {
                     $("#quantity").append("<option class='quantity1'>"+i+"</option>");  
                   }
               return false;
            });
        
  
        </script>
    </body>
</html>
