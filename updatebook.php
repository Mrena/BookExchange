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
            <header><h1>Update Book</h1></header>
           
        <?php
        // put your code here
        
        require_once 'Seller.php';
        require_once 'Book.php';
        
        
        include_once 'includes/logged.php';
        include_once 'includes/search.php';
        include_once 'includes/menu.php';
        
       
        
        ?>
        <section>
            <form action="" method="POST">
            <table class="text">
                <tr><td><select>
                            <option>Book ID</option>
                        </select></td><td><input type="text" name="updateSearch" id="updateSearch" /></td></tr>
            </table>  
            </form>
        </section>
        
        <?php
        
         if(isset($_POST['updateSearch']))
         {
            global $seller;
             
            $bookId = $_POST['updateSearch'];
            $objBook = new Book();
            $objBook->getBookBySellerAndID($seller,$bookId);
        }
        if(isset($_POST['update']))
        {
             
            $bookId = $_POST['bookId'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $quantity = $_POST['quantity'];
            $condition = $_POST['condition'];
            $price = $_POST['price'];
            $book_preview_link = $_POST['book_preview_link'];
            $keywords = $_POST['keywords'];
    
            $objBook = new Book();
            $objBook->updateBook($title, $author,$quantity, $condition, $price, $book_preview_link, $keywords,$bookId);
            
            
        }
        
        include_once 'includes/searchlogic.php';
        ?>
            <footer><?php include_once 'includes/footer.php'; ?></footer>
        </div>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/search.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <script>
        $("#updateSearch").keydown(function(e){
            
            var enter = 13;
            if(e.which==enter)
                {
                    $(this).submit();
                }
            
        });
        $("#update").click(function(){
            // validate 
        });
    </script>
    </body>
</html>
