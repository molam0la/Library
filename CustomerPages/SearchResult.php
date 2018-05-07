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
                <li><a href="Login.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
            <th>Author</th>
            <th>Status</th>
        </tr>
        <?php
        require __DIR__ . '/../Functions/Functions.php';

        use function Functions\Functions\logException;

if (isset($_POST['search'])) {
            $search = $_POST['search'];
            echo "<h2>Your search result for " . "'" . "<i>$search</i>" . "'</h2>";
        }

        if (isset($_POST['submit'])) {
            if (preg_match("/^[  a-zA-Z]+/", $_POST['search'])) {
                $dsn = "mysql:host=localhost;dbname=Library_v5";
                $user = "LibraryAdmin";
                $password = "booksrock";
                $options = null;

                try {
                    $pdo = new PDO($dsn, $user, $password, $options);
                    $result = $pdo->query("SELECT * FROM book AS b JOIN author AS a ON b.Author_ID = a.Author_ID JOIN status as s ON b.Status_ID = s.Status_ID WHERE b.Title LIKE '%$search%'");
                    $rows = $result->fetchAll();

                    $num_rows = count($rows);
                    if ($num_rows > 0) {
                        foreach ($rows as $tablerow) {
                            echo '<tr>';
                            echo '<td>' . $tablerow["Title"] . '</td>';
                            echo '<td>' . $tablerow["Firstname"] . " " . $tablerow["lastname"] . '</td>';
                            echo '<td>' . $tablerow["Status"] . '</td>';
                        }
                    } else {
                        echo "No results matching your search found";
                    }
                } catch
                (PDOException $e) {
                    echo "Snap! ";
                    logException($e);
                }
            }
        }
        ?>
    </table>
</body>
</html>