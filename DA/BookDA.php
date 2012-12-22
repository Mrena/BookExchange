<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookBL
 *
 * @author Mrena
 */
require_once 'Connector.php';
require_once 'SQLException.php';
class BookBL extends Connector {
    //put your code here
   
   // private $connector;
    
    function _construct()
    {
        parent::__construct();
       
       $this->connect();
       $this->selectDB("bookexchange");
        
    }
    
    public function getBookByUsernameAndId($seller,$bookId)
    {
        
        $this->connect();
        $query = "SELECT * FROM Books WHERE seller='$seller' AND bookId=$bookId AND deleted=0";
        if($result = $this->runSelectQuery($query,$this->con))
            return $result;
             else
                 throw new SQLException();
        
        
    }
    
    public function getBooksByTitle($title)
    {
        
        $this->connect();
        $query = "SELECT * FROM Books WHERE title='$title' AND deleted=0";
        $result = $this->runSelectQuery($query,$this->con);
         if($result!=null)
             return $result;
           else
               throw new SQLException();
    }
    public function getBooksByAuthor($author)
    {
        
       $this->connect();
        $query = "SELECT * FROM Books WHERE author='$author' AND deleted=0";
        $result = $this->runSelectQuery($query,$this->con);
         if($result!=null)
             return $result;
           else
               throw new SQLException();
    }
    
    public function getBooksByCategory($category)
    {
       
        $this->connect();
        $query = "SELECT * FROM Books WHERE category='$category' AND deleted=0";
        $result = $this->runSelectQuery($query,$this->con);
         if($result!=null)
             return $result;
           else
              throw new SQLException();
        
    }
    public function getBooksBySeller($seller)
    {
        
        $this->connect();
        $query = "SELECT * FROM Books WHERE seller='$seller' AND deleted=0";
        $result = $this->runSelectQuery($query,$this->con);
         if($result!=null)
             return $result;
           else
               throw new SQLException();
    }
    
    public function getBooksByKeyword($keyword)
    {
        
        $this->connect();
         $query = "SELECT * FROM Books WHERE keyword LIKE '$keyword' AND deleted=0";
        $result = $this->runSelectQuery($query,$this->con);
        if($result!=null)
             return $result;
           else
               throw new SQLException();
            
        
    }
    public function getBookById($bookId)
    {
        
        $this->connect();
        $query = "SELECT * FROM Books WHERE bookId='$bookId' AND deleted=0";
        $result = $this->runSelectQuery($query,$this->con);
        if($result!=null)
             return $result;
           else
               throw new SQLException();
    }
    public function addBookBL($title,$author,$category,$quantity,$condition,$price,$book_preview_link,$seller,$sellStatus,$keywords,$deleted)
    {
        
       $this->connect();
      //  $this->validateBook($title,$author,$category,$quantity,$condition,$price,$book_preview_link,$sellStatus) == true ? "" : die("Book already added.");
       $query = "INSERT INTO Books (title,author,category,quantity,bookCondition,price,book_preview_link,seller,sellStatus,keywords,deleted) VALUES('$title','$author','$category','$quantity','$condition',$price,'$book_preview_link','$seller','$sellStatus','$keywords','$deleted')";
        if($this->runQuery($query,$this->con))
        {
            
        return true;
        }
         else
             throw new SQLException();
        
    }
    
    private function validateBook($title,$author,$category,$quantity,$condition,$price,$book_preview_link,$sellStatus)
    {
        
         $query = "SELECT * FROM Books WHERE title='$title' AND author='$author' AND category='$category' AND quantity=$quantity AND bookCondition='$condition' AND price=$price AND book_preview_link='$book_preview_link' AND sellStatus=$sellStatus)";
        if($this->runQuery($query,$this->con))
        {
           
        return true;
        }
         else
             throw new SQLException();
        
    }
    
    public function deleteBook($bookId,$seller)
    {
        $this->connect();
         $query = "UPDATE books SET deleted=1 WHERE bookId='$bookId' AND seller='$seller'";
        if($this->runQuery($query,$this->con))
        return true;
         else
             throw new SQLException();
    }
    
    public function updateBook($title,$author,$quantity,$condition,$price,$book_preview_link,$keywords,$bookId)
    {
        $this->connect();
        $query = "UPDATE Books SET title='$title',author='$author',quantity=$quantity,bookCondition='$condition',price=$price,book_preview_link='$book_preview_link',keywords='$keywords' WHERE bookId=$bookId";
        if($this->runQuery($query,$this->con))
        return true;
         else
             throw new SQLException(); 
    }
    
    public function getRandomBooks($numOfBooks)
    {
        $randNumArr = new ArrayObject();
        for($i=0;$i<$numOfBooks;$i++)
        {
            $num = mt_rand(0, $numOfBooks);
            $randNumArr->append($num);
        }
        $this->connect();
        $query = "SELECT * FROM Books WHERE bookId<$randNumArr->count()+1";// must find a way to randomize
        $result = $this->runSelectQuery($query,$this->con);
         if($result!=null)
             return $result;
             else
                 throw new SQLException();
        
    }
    
    public function getBooksCount()
    {
        $this->connect();
        $query = "SELECT COUNT(*) FROM Books";
        if($booksNum = $this->runSelectQuery($query))
        {
            $row = mysql_fetch_array($booksNum);
            return $row[0];
        }
             else
                 throw new SQLException();
        
    }
    
    public function addToCart($buyer,$bookId,$quantity)
    {
        
        $this->connect();
        $query = "INSERT INTO Cart (buyer,bookId,quantity) VALUES($buyer,$bookId,$quantity)";
        if($this->runQuery($query))
            return true;
        else
            throw new SQLException();
        
        
    }
    
    public function getBookPreviewLink($bookId)
    {
        $this->connect();
        $query = "SELECT book_preview_link FROM Books WHERE bookId=$bookId";
        $result =  $this->runSelectQuery($query);
        if($row = mysql_fetch_array($result))
        {
            $book_preview_link = $row[0]; 
            $this->disconnect();
            return $book_preview_link;
        }
        else
            throw new SQLException();
        
        
        
    }
}

?>
