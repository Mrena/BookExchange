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
        // put your code here
       
        
        
        ?>
    </head>
    <body>
        <div id="page">
        <header><h1>Add Book</h1></header>
        <canvas id="game" width="890" height="100">  </canvas>
        <?php
        try{
            error_reporting(0);
        session_start();
        }catch(Exception $e)
        {
         $e =$e;   
        }
        require_once 'includes/logged.php';
        require_once 'Book.php';
        
    
        $sellStatus = 0;
        
        @$title = $_POST['title'];
        @$author = $_POST['author'];
        @$category = $_POST['category'];
        @$quantity = $_POST['quantity'];
        @$condition = $_POST['condition'];
        @$price = $_POST['price'];
        @$bookPreview = $_POST['bookPreview'];
        @$keywords = $_POST['keywords'];
        $deleted = 0;
        if(isset($author))
              {
            global $seller;
        $objBook = new Book();
        $objBook->addBook($title, $author, $category, $quantity, $condition, $price, $bookPreview,$seller,$sellStatus, $keywords,$deleted);
        
        }
        
        
        
    
    
        include_once 'includes/search.php';
        include_once 'includes/menu.php';
        ?>
        <section>
            <form action="" method="POST">
            <table class="text">
                <tr><td>Title:</td><td><input type="text" name="title" id="title" /></td></tr>
                <tr><td>Author:</td><td><input type="text" name="author" id="author" /></td></tr>
                <tr><td>Category:</td><td><select name="category" id="category">
                            
                            <option>Select Category</option>
                            <option>Academic</option>
                            <option>Novels</option>
                            <option>Reference</option>
                            <option></option>
                            <option></option>
                        </select></td></tr>
                <tr><td>Quantity:</td><td><select name="quantity" id="quantity">
                            <option class="quantity1">Select quantity</option>
                        </select><a href="#" id="next">Next</a></td></tr>
                <tr><td>Condition:</td><td><select name="condition" id="condition">
                            <option>Select Condition</option>
                            <option>Shabby</option>
                            <option>Good</option>
                            <option>Excellent</option>
                            <option>Brand New</option>
                        </select>
                        </td></tr>
                <tr><td>Price (R):</td><td><input type="text" name="price" id="price" /></td></tr>
                <tr><td>Book Preview Link:</td><td><input type="text" name="bookPreview" id="bookPreview" /></td></tr>
                <tr><td>Keywords:</td><td><input type="text" name="keywords" id="keywords" /></td></tr>
                <tr><td><td></td><td><input type="text" name="seller" value="<?php echo $seller ?>" hidden/></td></tr>
                <tr><td><input type="submit" name="submit" id="submit" value="Add" /></td><td></td></tr>
            </table>
            </form>
        </section>
        <div id="err"></div>
        <footer><?php include_once 'includes/footer.php'; ?></footer>
        <?php
        include_once 'includes/searchlogic.php';
        ?>
        </div>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/search.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <script>
            $(document).ready(function(){
                
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
               
            });
        
  
        </script>
    </body>
</html>
