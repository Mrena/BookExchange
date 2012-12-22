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
            <header>
    <h1>Book Preview</h1></header>
            
        <?php
        // put your code here
         require_once 'Seller.php';
        require_once 'Book.php';
        $seller = "null";
        include_once 'includes/logged.php';
          
          if(isset($_POST['logout']))
              echo "hello";
        
        
         include_once 'includes/search.php';
        ?>
        <table>
        <tr>
            <td><a href="home.php">Home</a></td>
            <td><a href="addbook.php">Add Book</a></td>
            <td><a href="updatebook.php">Update Book</a></td>
            <td><a href="deletebook.php">Delete Book</a></td>
            <td><a href="index.php?logout=true"  id="logout">Logout</a></td>
        </tr>
        </table>
            <table id="randonBookSlide"><tr><td><a href="purchase.php?bookId=12345"><img width="190" height="150" src="images/us-wp1.jpg" alt="book" /></a></td><td><a href="purchase.php?bookId=12345"><img width="190" height="150" src="images/us-wp2.jpg" alt="book" /></a></td><td><a href="purchase.php?bookId=12345"><img width="190" height="150" src="images/us-wp4.jpg" alt="book" /></a></td><td><a href="purchase.php?bookId=12345"><img width="190" height="150" src="images/us-wp5.jpg" alt="book" /></a></td><td><a href="purchase.php?bookId=12345"><img width="190" height="150" src="images/img7.jpg" alt="book" /></a></td></tr>  </table>
            <canvas id="game" width="890" height="100">  </canvas>
            <?php
            echo "<p>Your Books:</p>";
            $objBook = new Book();
            $objBook->displayBookBySeller($seller);
            
            include_once 'includes/searchlogic.php';
            ?>
            
            <footer><?php include_once 'includes/footer.php'; ?></footer>
        </div>
        
         <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/search.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <script>
           
                
                $("#logout").click(function(){
                    alert("Logging out...");
                  $(this).ajaxSetup({
            url: "sellerdashboard.php" ,
            global: true,
            type: POST  
            }); 
                
               $(this).ajax({data: "Hello"});
                });
                
                $.ajaxComplete(function(){
                    window.location = "index.php";
                });
        
    </script>
    </body>
</html>
