<?php
    // Page title:
    echo "<h3>Control Panel</h3>";
    echo "<a href='output.php'>See Database Records</a> | <a href='password.php'>Change Your Passwrod</a>";
    //echo "<a href='login.php'>Go back to control panel</a>";
    // Include connecton script to database:
    include("connection.php");
    // Define query:
    $q = "SELECT last_name, first_name, email, DATE_FORMAT(registration_date, '%M %d, %Y %T') AS dr, id FROM users ORDER BY registration_date ASC";
    // Query select all fields from table users:
    $r = mysqli_query($dbc, $q);
    // Count the number of returned rows:
    $num = mysqli_num_rows($r);
    // If any rows returned, display records:
    if($num > 0) {

        // Inform how many users are registered:
        echo "<p>There are $num registered users.</p>";
        // Create table:
        echo "<table align='center' border='1' cellspacing='3' cellpadding='3' width='75%'>
        <tr>
            <td align='left'><b>Edit</b></td>
            <td align='left'><b>Delete</b></td>
            <td align='left'><b>Name</b></td>
            <td align='left'><b>Email</b></td>
            <td align='left'><b>Date Registered</b></td>
        </tr>";
        // Use while loop to create an associative array with values registration_date, last_name, first_name and email:
        while($row = mysqli_fetch_array($r)) {
            echo "<tr>
                      <td align='left'><a href='edit_user.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&lemail=".$row['email']."'>Edit</a></td>
                      <td align='left'><a href='delete.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."'>Delete</a></td>
                      <td align='left'>".$row['last_name'].", ".$row['first_name']."</td>
                      <td align='left'>".$row['email']."</td>
                      <td align='left'>".$row['dr']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "There are currently no registered users!";
    }


    mysqli_close($dbc);
?>