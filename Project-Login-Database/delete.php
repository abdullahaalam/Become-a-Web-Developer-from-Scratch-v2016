<?php
    // Avoid error notices, display only warnings:
    error_reporting(0);
    // Check if user submitted form:
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Connect to database:
        include('connection.php');
        // Get input email value from form:
        $id_user = mysqli_real_escape_string($dbc, trim($_POST['user_id']));
        // Delete user where email = $getemail:
        mysqli_query($dbc, "DELETE FROM users WHERE id ='$id_user'");
        echo "The user has been sucessfully deleted!";
    } else {
        echo "Please Login";
    }
?>
<h3>Are you sure you want to delete this user?</h3>

<form method="post" action="delete.php">
    <p>User ID: <input type='text' name='user_id' value="<?php echo $_GET['user_id']; ?>" /></p>
    <p>First Name: <input type='text' name='first_name' value="<?php echo $_GET['fname']; ?>" /></p>
    <p>Last Name: <input type='text' name='last_name' value="<?php echo $_GET['lname']; ?>" /></p>
    <p><input type='submit' name='submit' value='Yes' /></p>
    <p><a href="output.php">Go Back</a></p>
</form>