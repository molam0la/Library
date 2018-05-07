<!DOCTYPE html>
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
    <style>
        h1 {
            text-align:center;
        }
        h2 {
            display: inline-block;
        }
    </style>
    <h2 class="floatLeft"> All Books </h2>
    <br>
    <br>

    <?php
    $dsn = "mysql:host=localhost;dbname=library_v6";
    $user = "root";
    $password = nulL;
    $options = null;

    try {
        $pdo = new PDO($dsn, $user, $password, $options);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    try {
        $stmt = $pdo->query("SELECT * FROM book")->fetchAll();
        PDO::FETCH_ASSOC;
        foreach ($stmt as $row) {
            echo "<tr>
            <td><a href='BookDetails.php?book=" . $row[0] . "'>" . $row['Title'] . "</a></td> <br> \n";
        }
        unset($stmt);
    } catch (AllBooksException $e) {
        echo $e->getMessage();
        $error = $e->errorInfo();
        die();
    }
    ?>









</body>
</html>




