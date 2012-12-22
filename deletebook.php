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
        <header><h1>Delete Book</h1></header>
        
        <?php
        // put your code here
          require_once 'Seller.php';
        require_once 'Book.php';
        $seller="null";
        include_once 'includes/logged.php';
        
        
        include_once 'includes/search.php';
        include_once 'includes/menu.php';
        ?>
        
        <section>
            <form action="" method="POST">
            <table>
                <tr><td><select>
                            <option>Book ID</option>
                        </select></td><td><input type="text" name="updateSearch" id="updateSearch" /></td></tr>
            </table>  
            </form>
        </section>
        
        <?php
        
        
         if(isset($_POST['updateSearch']))
        {
            $bookId = $_POST['updateSearch'];
            $objBook = new Book();
            $objBook->dispalyBookUpdateForm($bookId);
        }
      else if(isset($_POST['delete']))
        {
            $bookId = $_POST['bookId'];
            $objBook = new Book();
            $objBook->deleteBook($bookId,$seller);
        }
       
        include_once 'includes/searchlogic.php';
        ?>
        <footer><?php include_once 'includes/footer.php'; ?></footer>
        </div>
        
         <script src="js/jquery-1.8.3.min.js"></script>
         <script src="js/search.js"></script>
         <script type="text/javascript" src="js/effect.js"></script>
        <script>
            $("#update").replaceWith("<input type='submit' name='delete' id='delete' value='Delete' />");
        
        $(".update").hover(function(){
            $(this).hide();
            
        }, function(){
            $(this).show();
        }).css("color","grey");
        </script>
    </body>
</html>
