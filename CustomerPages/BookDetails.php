<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Navbar-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="custom.css">
    </head>
    <body>
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" aria-expanded="false"></button>
                    <a class="navbar-brand">TheLibrary <span class="caret"></span></a>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="MainPage.html">Home</a></li>
                        <li><a href="AllBooks.php">All Books</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">My cart</a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Login.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
        </nav>    
        <div class="floatRight">
            <button id="searchButton" onclick="getSearchResult()">Search</button></div>
    </div>
    <!--figure out padding around search box to have the button next to it-->
    <form class="navbar-form navbar-right" action="SearchResult" method="POST"> 
        Book search: <input type="search" class="form-control" id="mySearch" value="Your Search">

    </form>

    <div class="floatLeft"><img src="../Images/LibraryLogo.png" width="100" height="100" alt="Library logo"></div>
    
    <style>
        h1 {
                display: inline-block;
            }
        h2 {
            display: inline-block;
        }
        table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
        </style>
        <h1> Details </h1>
        <table>
  <tr>
    <th>Title</th>
    <th>Published</th>
    <th>Times Borrowed</th>
    <th>Category</th>
    <th>Language</th>
    <th>Author Firstname</th>
    <th>Author Lastname</th>
    <th>Publisher</th>
  </tr>
        
        
 

<?php
    $dsn = "mysql:host=localhost;dbname=library_v6";
    $user = "root";
    $password = nulL;
    $options = null;
    
    try {
        $pdo = new PDO ($dsn, $user, $password, $options);
    } catch (PDOException $e) {
        die ($e ->getMessage());
    }
    
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    try {
        $value= $_REQUEST["book"];
        $details = $pdo->query("SELECT book.Book_ID, book.Title, book.PublishDate, book.TimesBookBorrowed, Category.Category_Type, Language.Languages, Author.Firstname, Author.lastname, Publisher.Publisher
FROM book
INNER JOIN Category ON book.Category_ID = Category.Category_ID
INNER JOIN Language ON book.Language_ID = Language.Language_ID
INNER JOIN Author ON book.Author_ID = Author.Author_ID
INNER JOIN Publisher ON book.Publisher_ID = Publisher.Publisher_ID
WHERE Book_ID = $value;");

           
    } catch (detailsException $e) {
echo $e ->getMessage();
    $error = $e->errorInfo();
    die();
    }
    $result = $details->fetch();
 echo   "<tr>
    <td>$result[1]</td>
    <td>$result[2]</td>
    <td>$result[3]</td>
    <td>$result[4]</td>
    <td>$result[5]</td>
    <td>$result[6]</td>
    <td>$result[7]</td>
    <td>$result[8]</td> </tr>";
 
//    echo "$result[0]. $result[1] was published on $result[2] and has been borrowed $result[3] times. ";
    
    
    
  
    
    
    
