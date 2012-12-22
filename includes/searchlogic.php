<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  $objBook = new Book();
         if(isset($_POST['searchOp']))
         {
             $searchOp = $_POST['searchOp'];
             $searchStr = $_POST['search'];
             echo "<p style='color:green'>Search Results<p>";
             switch($searchOp)
             {
                 case "Title": $objBook->displayBooksByTitle($searchStr);
                     break;
                 case "Author": $objBook->displayBooksByAuthor($searchStr);
                     break;
                 case "Category": $objBook->displayBooksByCategory($searchStr);
                     break;
                 case "Keyword": $objBook->displayBooksByKeyword($searchStr);
                     break;
             }
         }

?>
