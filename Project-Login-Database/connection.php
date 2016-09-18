<?php
    $hostname = "localhost";
    $username = "root";
    $password1 = "";
    $dbname = "myfirstdatabase";
    // Making the connection to MySQL
    $dbc = mysqli_connect($hostname, $username, $password1, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());
    // Set encoding
    mysqli_set_charset($dbc, "utf8");
?>