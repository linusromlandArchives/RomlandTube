<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into users (username, password, email, date, profilepicture, banner)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime', 'profilepicture/default.png', 'banner/default.png')";
        $result   = mysqli_query($con, $query);
	shell_exec("mkdir /home/server/users/tjo"); 
        if ($result) {
	
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='../registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
?>