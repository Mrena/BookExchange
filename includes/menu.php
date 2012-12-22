<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<table id="menu"><tr><td><a href="home.php">Home</a> </td>
    <?php
    // if a user is logged there should be a link to the seller dashboard
    if(isset($_SESSION['username']))
            echo "<td><a href='sellerdashboard.php'>Seller Dashboard</a></td>";
    
        require_once 'Book.php';
    
    $bookPreviewLinks =  array();
    $bookIds = array();
    $objBook = new Book();
    $max = $objBook->getBookCount();
    for($i=0;$i<5;$i++)
    {
       
     $num = mt_rand(1, $max);
     $bookIds[$i] = $num;
     
     $bookPreviewLinks[$i] = $objBook->getBookPreviewLink($num);
     
    }
    
    
    ?><td><a href="cart.php?">Cart</a></td><td><a id="logout" href="index.php?logout=true">Logout</a></td></tr></table>
<table id="randonBookSlide"><tr><td><a href="purchase.php?bookId=<?php echo $bookIds[0] ?>"><img class="preview" width="190" height="150" src="<?php echo $bookPreviewLinks[0] ?>" alt="book" /></a></td><td><a href="purchase.php?bookId=<?php echo $bookIds[1] ?>"><img class="preview" width="190" height="150" src="<?php echo $bookPreviewLinks[1] ?>" alt="book" /></a></td><td><a href="purchase.php?bookId=<?php echo $bookIds[2] ?>"><img class="preview" width="190" height="150" src="<?php echo $bookPreviewLinks[2] ?>" alt="book" /></a></td><td><a href="purchase.php?bookId=<?php echo $bookIds[3] ?>"><img class="preview" width="190" height="150" src="<?php echo $bookPreviewLinks[3] ?>" alt="book" /></a></td><td><a href="purchase.php?bookId=<?php echo $bookIds[4] ?>"><img class="preview" width="190" height="150" src="<?php echo $bookPreviewLinks[4] ?>" alt="book" /></a></td></tr>  </table>
<canvas id="game" width="890" height="100">  </canvas>
<script>

</script>