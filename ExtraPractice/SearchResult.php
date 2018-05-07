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
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">All Books</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">My cart</a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
        </nav>    

        <!--figure out padding around search box to have the button next to it-->
        <form class="navbar-form navbar-right" action="SearchResult.php?go" method="POST" id="searchform"> 
            Book search: <input type="search" class="form-control" name="search" id="mySearch" value=" ">
            <div class="floatRight">
                <button type="submit" name="submit" id="searchButton" onclick="getSearchResult()" value="Search">Search</button></div>
        </div>
    </form>
    <div class="floatLeft"><img src="../Images/LibraryLogo.png" width="100" height="100" alt="Library logo"></div>
    <style>
        h2 {
            display: inline-block;
        }</style>
    <h2 class="results">Search results for</h2><i><h2 id="searchResult"></h2></i>
    <br>
    <?php
    if (isset($_POST['submit'])) {
        if (isset($_GET['go'])) {
            if (preg_match("/^[  a-zA-Z]+/", $_POST['search'])) {
                $search = $_POST['search'];

                $dsn = "mysql:host=localhost;dbname=Library_v5";
                $user = "root";
                $password = null;
                $options = null;

                try {
                    $pdo = new PDO($dsn, $user, $password, $options);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

                $result = $pdo->query("SELECT * FROM book AS b JOIN author AS a ON b.Author_ID = a.Author_ID WHERE b.Title LIKE '%$search%'");
                $rows = $result->fetchAll();

                $num_rows = count($rows);
                if ($num_rows > 0) {
                    foreach ($rows as $row) {
                        print_r($row["Title"] . " " . ($row["Firstname"]) . " " . ($row["lastname"]) . "<br/>");
                    }
                } else {
                    echo "No results matching your search found";
                }
            }
        }
    }
    ?>
    <script>
        function getSearchResult() {
            var searchResult = document.getElementById("mySearch").value;
            document.getElementById("searchResult").innerHTML = searchResult;
        }
        (function () {
            var input = document.getElementById("mySearch");
            input.addEventListener("keypress", function (event) {

                if (event.keyCode === 13) {
                    event.preventDefault();
                    getSearchResult()
                }
            });
        }());
    </script>
    <p class="results">Click on the title to find out more</p>
    <div class="floatRight"><img src="../Images/cart.jpg" width="100" height="100" alt="Image of a cart"></div>
</body>
</html>
