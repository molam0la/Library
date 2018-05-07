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