<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
        <title>Search Results</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="custom.css">
    </head>
    <p><body>
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
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
    </nav>    
    <form  method="post" action="SearchResult.php"  id="searchform" class="navbar-form navbar-right">
        <div class="floatRight">
            Book title search: <input  type="text" name="search">
            <button type="submit" name="submit" id="searchButton" onclick="getSearchResult()" value="Search">Search</button>
        </div>
    </form>
    <table class="resultsTable">
        <tr>
            <th>Title</th>
            <th>Publish Date</th>
            <th>Times Book Borrowed</th>
        </tr>
        <?php

//        
        $dsn = "mysql:host=localhost;dbname=Library_v6";
        $user = "root";
        $password = null;
        $options = null;
        try {
            $pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }


        if (isset($_GET['search'])) {
        $search = $_GET['search'];}
         else {
            die("Woops!");
        }



        $result = $pdo->query("SELECT * FROM book WHERE Title LIKE '%$search%';");
        $rows = $result->fetchAll();

        $num_rows = count($rows);
        if ($num_rows > 0) { 
            echo  "<h2>Your search result for <i>$search</i> </h2>";
            foreach ($rows as $tablerow) {
                echo '<tr> <td>' . $tablerow["Title"] . '</td>';
                echo '<td>' . $tablerow["PublishDate"] . '</td>';
                echo '<td>' . $tablerow["TimesBookBorrowed"] . '</td></tr>';
            }
        } else {
            echo "No results matching your search '$search' found";
        }

//      
//            
        ?>
    </table>
    
</body>
</html>