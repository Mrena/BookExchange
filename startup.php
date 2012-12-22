<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DA/Connector.php';


class StartUp extends Connector
{
    
    private $db = "BookExchange";
   
    
    public function init()
    {
$obj = new Connector();
if($obj->connect())
{
   

   $query = "CREATE DATABASE BookExchange";
   echo $obj->runQuery($query) ? "Database BookExchange created\n" :  "Could not create database\n".  mysql_error()."\n<br />"; 

   
   
   
   $query = "CREATE TABLE Users(
       f_name VARCHAR(50),
       l_name VARCHAR(50),
       username VARCHAR(50) PRIMARY KEY NOT NULL,
       password VARCHAR(50) NOT NULL,
       email_address VARCHAR(50) NOT NULL,
       physical_address VARCHAR(50),
       service_code BINARY 
       

)";
   
   echo $obj->runQuery($query) ? "Table Users created" :  "Could not create table".  mysql_error()."\n<br />";

   $query = "CREATE TABLE Books (
            bookId INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(50) NOT NULL,
            author VARCHAR(50) NOT NULL,
            category VARCHAR(50) NOT NULL,
            quantity INTEGER NOT NULL,
            bookCondition VARCHAR(50) NOT NULL,
            price INTEGER NOT NULL,
            book_preview_link VARCHAR(50) NOT NULL,
            seller VARCHAR(50) NOT NULL,
            sellStatus BINARY NOT NULL,
            keywords VARCHAR(50) NOT NULL,
            deleted INTEGER NOT NULL,
            FOREIGN KEY(seller) REFERENCES Users(username)
            

            )";
   
    echo $obj->runQuery($query) ? "Table Books created" :  "Could not create table".  mysql_error()."\n<br />";
    



$query = "INSERT INTO Users (f_name,l_name,username,password,email_address,physical_address,service_code) VALUES('Khulekani','Ngongoma','Mrena','12345','mrena.pro@gmail.com','Durban,South Africa',1)";
echo $obj->runQuery($query) ? "Sample User Created" :  "Could not create sample user".  mysql_error()."\n<br />";


$query = "INSERT INTO Books (title,author,category,quantity,bookCondition,price,book_preview_link,seller,sellStatus,keywords,deleted) VALUES('Sample','Sample','Academic',10,'Brand New',100,'images/us-wp1.jpg','Mrena',0,'Sample',0)";
echo $obj->runQuery($query) ? "Sample book added" :  "Could not add sample book".  mysql_error()."\n<br />";

$query = "INSERT INTO Books (title,author,category,quantity,bookCondition,price,book_preview_link,seller,sellStatus,keywords,deleted) VALUES('Sample 1','Sample 1','Academic',10,'Brand New',100,'images/us-wp2.jpg','Mrena',0,'Sample',0)";
echo $obj->runQuery($query) ? "Sample book added" :  "Could not add sample book".  mysql_error()."\n<br />";

$query = "INSERT INTO Books (title,author,category,quantity,bookCondition,price,book_preview_link,seller,sellStatus,keywords,deleted) VALUES('Sample 2','Sample 2','Academic',10,'Brand New',100,'images/us-wp4.jpg','Mrena',0,'Sample',0)";
echo $obj->runQuery($query) ? "Sample book added" :  "Could not add sample book".  mysql_error()."\n<br />";

$query = "INSERT INTO Books (title,author,category,quantity,bookCondition,price,book_preview_link,seller,sellStatus,keywords,deleted) VALUES('Sample 3','Sample 3','Academic',10,'Brand New',100,'images/us-wp5.jpg','Mrena',0,'Sample',0)";
echo $obj->runQuery($query) ? "Sample book added" :  "Could not add sample book".  mysql_error()."\n<br />";

$query = "INSERT INTO Books (title,author,category,quantity,bookCondition,price,book_preview_link,seller,sellStatus,keywords,deleted) VALUES('Sample 4','Sample 4','Academic',10,'Brand New',100,'images/img7.jpg','Mrena',0,'Sample',0)";
echo $obj->runQuery($query) ? "Sample book added" :  "Could not add sample book".  mysql_error()."\n<br />";

$query = "CREATE TABLE Cart(
           buyer VARCHAR(50) NOT NULL, 
           bookId INTEGER NOT NULL,
           quantity INTEGER NOT NULL,
           bookId FORIEGN KEY REFERENCES Books(bookId)
                        )";
   echo $this->runQuery($query) ? "Cart table created" : "Could not create Cart table".  mysql_error();



}
else
    echo "Could not connect".  mysql_error()."\n<br />";

 


    }
}

$objStartUp = new StartUp();
$objStartUp->init();
?>
