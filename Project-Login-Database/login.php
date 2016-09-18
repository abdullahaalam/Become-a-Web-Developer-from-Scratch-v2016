<?php
    error_reporting(0);
    include("connection.php");
    // Grab values email and password from login form

    $login_email = mysqli_real_escape_string($dbc, trim($_POST['login_email']));
    $login_password = mysqli_real_escape_string($dbc, $_POST['login_password']);
    // Create the query and number of rows returned from the query
    $query = mysqli_query($dbc, "SELECT * FROM users WHERE email='".$login_email."'");
    $numrows = mysqli_num_rows($query);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create condition to check if there is 1 row with that email
    if($numrows != 0) {
        // Grab the email and password from that row returned before
        while($row = mysqli_fetch_array($query)) {
            $dbemail = $row['email'];
            $dbpass = $row['password'];
            $dbfirstname = $row['first_name'];
        }
        // Create condition to check if email and password are equal to the returned row
        if($login_email == $dbemail) {
            if($login_password == $dbpass) {
                echo "<p>Welcome ".$dbfirstname.", you are in!</p>";
                include ("navbar.php");
            } else {
                echo "your password is incorrect!";
            }
        } else {
            echo "your email is incorrect!";
        }
    } else {
        echo "Invalid credentials! If you are not registered, please register below...";
    }

    } else {
        echo "Please Login...";
    }
?>
