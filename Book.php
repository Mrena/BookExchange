<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Book
 *
 * @author Mrena
 */
require_once 'DA/BookDA.php';

class Book {
    //put your code here
    private $bookId;
    private $title;
    private $author;
    private $category;
    private $quantity;
    private $condition;
    private $price;
    private $book_preview_link;
    private $seller;
    private $sellStatus;
    private $keywords;
    private $bookBL;
    
    public function _construct()
    {
        
        $this->bookBL = new BookBL();
        
    }
    
    public function displayBooksByTitle($title)
    {
        $bookBL = new BookBL();
        $result = $bookBL->getBooksByTitle($title);
        $this->display($result);
    }
    
    public function displayBookById($bookId)
    {
        $bookBL = new BookBL();
        $result = $bookBL->getBookById($bookId);
        $this->display($result);
    
        
    }
    
    public function displayBooksByAuthor($author)
    {
        $bookBL = new BookBL();
        $result = $bookBL->getBooksByAuthor($author);
        $this->display($result);
        
    }
    public function displayBooksByCategory($category)
    {
        $bookBL = new BookBL();
        $result = $bookBL->getBooksByCategory($category);
        $this->display($result);
        
    }
    public function displayBookBySeller($seller)
    {
        $bookBL = new BookBL();
        $result = $bookBL->getBooksBySeller($seller);
        $this->display($result);
        
    }
    public function displayBooksByKeyword($keyword)
    {
        $bookBL = new BookBL();
        $result = $bookBL->getBooksByKeyword($keyword);
        $this->display($result);
    }
    
    public function deleteBook($bookId,$seller)
    {
        $bookBL = new BookBL();
        if($bookBL->deleteBook($bookId,$seller))
            echo "Book successfully deleted";
             else
                 echo "Could not delete book";
        
    }
    private function display($result)
    {
        echo "<hr />";
        echo "<table class='text'>";
        while($row = mysql_fetch_array($result))
        {
            $bookId = $row[0];
            $title = $row[1];
            $author = $row[2];
            $category = $row[3];
            $quantity = $row[4];
            $condition = $row[5];
            $price = $row[6];
           // $book_preview_link = $row[7];
            $seller = $row[8];
            $sellStatus = $row[9];
            
            
            if($sellStatus==0)
            {
            echo "<tr><td >Book ID: </td><td id='bookId'>$bookId </td></tr>";
            echo "<tr><td>Title: </td><td>$title </td></tr>";
            echo "<tr><td>Author: </td><td>$author </td></tr>";
            echo "<tr><td>Category: </td><td>$category </td></tr>";
            echo "<tr><td>Quantity: </td><td>$quantity </td></tr>";
            echo "<tr><td>Condition: </td><td>$condition </td></tr>";
            echo "<tr><td>Price: </td><td>R$price </td></tr>";
            echo "<tr><td>Seller: </td><td>$seller </td></tr>";
            echo "<tr><<td><a id='preview' href='preview.php?$bookId'>Preview Book</a> </td></tr>";
            }
        }
        
        
        echo "</table></p>";
    }
    
    public function addBook($title,$author,$category,$quantity,$condition,$price,$book_preview_link,$seller,$sellStatus,$keywords,$deleted)
    {
        $bookBL = new BookBL();
        
        if($bookBL->addBookBL($title,$author,$category,$quantity,$condition,$price,$book_preview_link,$seller,$sellStatus,$keywords,$deleted))
                     echo "Book successfully added";
                  else
                      echo "Could not add book";
                  
                  
    }
    
    public function getBookBySellerAndID($seller,$bookId)
    {
       
      try
      {
      $objBookDA = new BookBL();
      $result =  $objBookDA->getBookByUsernameAndId($seller, $bookId);   
      $row = mysql_fetch_array($result);
          
          $this->dispalyBookUpdateForm($bookId);
          
     
      }catch(SQLException $err)
      {
          
         echo "Could not find book ".$err->getError(); 
      }
      
    }
    public function dispalyBookUpdateForm($bookId)
    {
        try{
        $bookBL = new BookBL();
        $result = $bookBL->getBookById($bookId);
        
        $row = mysql_fetch_array($result);
            $bookId = $row[0];
            $title = $row[1];
            $author = $row[2];
            $category = $row[3];
            $quantity = $row[4];
            $condition = $row[5];
            $price = $row[6];
            $book_preview_link = $row[7];
            $seller = $row[8];
           // $sellStatus = $row[9];
            $keywords = $row[10];
            
            echo "<form action='' method='POST'>";
            echo "<table>";
            echo "<tr><td><input type='text' class='hide' name='bookId' id='bookId' value='$bookId' hidden/> </td></tr>";
            echo "<tr><td><input type='text' class='hide' name='category' id='category' value='$category' hidden/> </td></tr>";
            echo "<tr><td><input type='text' class='hide' name='seller' id='seller' value='$seller' hidden/> </td></tr>";
            echo "<tr><td>Title: </td><td><input type='text' class='update' name='title' id='title' value='$title' /> </td></tr>";
            echo "<tr><td>Author: </td><td><input type='text' class='update' name='author' id='author' value='$author' /> </td></tr>";
            
            echo "<tr><td>Quantity: </td><td><input type='text' class='update' name='quantity' id='quantity' value='$quantity' /> </td></tr>";
            echo "<tr><td>Condition: </td><td><input type='text' class='update' name='condition' id='condition' value='$condition' /> </td></tr>";
            echo "<tr><td>Price: </td><td><input type='text' class='update' name='price' id='price' value='$price' /> </td></tr>";
            echo "<tr><td>Book Preview Link: </td><td><input type='text' class='update' name='book_preview_link' id='book_preview_link' value='$book_preview_link' /> </td></tr>";
            echo "<tr><td>Keywords: </td><td><input type='text' class='update' name='keywords' id='keywords' value='$keywords' /> </td></tr>";
            echo "<tr><td><input type='submit' name='update' id='update' value='Update' /></td></tr>";
            echo "</table>";
            echo "</form>";
            
            
        }catch(SQLException $sqle)
        {
            echo "Could not display update form ".$sqle->getError();
        } 
    }
 
    
    public function updateBook($title, $author,$quantity, $condition, $price, $book_preview_link, $keywords,$bookId)
    {
        try{
        $objBookDA = new BookBL();
        $objBookDA->updateBook($title, $author,$quantity, $condition, $price, $book_preview_link, $keywords,$bookId);
                echo "Book information updated";
          
        }catch(SQLException $sqle)
        {
            echo "Could not update book information ".$sqle->getError();
        }
    }
    
    public function getBookCount()
    {
        
        try{
        $objBookDA = new BookBL();
        $bookNum = $objBookDA->getBooksCount();
           return $bookNum;
       
        }catch(SQLException $sqle)
        {
            echo "Could not get number of books ".$sqle->getError();
        }
    }
    
    public function getBookPreviewLink($bookId)
    {
        
        try {
       $objBookDA = new BookBL();
       $book_preview_link = $objBookDA->getBookPreviewLink($bookId);
       return $book_preview_link;
              
        }catch(SQLException $sqle)
        {
            echo "Could not get book preview ".$sqle->getError();
        }
       
    }
    
    public function addBookToCart($buyer,$bookId,$quantity)
    {
        
        try{
            $objBookDA = new BookBL();
            $objBookDA->addToCart($buyer, $bookId, $quantity);
            echo "Book successfully added to Cart";
            
        }catch(SQLException $e)
        {
           echo "Could not add book to cart ".$e->getError(); 
        }
        
    }
    
}





?>
