<?php

$dsn = "mysql:host=localhost;dbname=Library_v5";
$user = "root";
$password = null;
$options = null;

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (Exception $ex) {
    die ($e->getMessage());
}

$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try {
    $search = $pdo->query("SELECT * FROM Author");
                    foreach ($search as $row) {
                        echo $row;
                    }
} catch (Exception $ex) {
}
