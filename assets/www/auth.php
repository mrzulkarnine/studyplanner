<?php
require("config.php" );
$results = array();
  $results['pageTitle'] = "Login Page";
       
    if ( isset( $_POST['login'] ) ) {

            // User has posted the` login form: attempt to log the user in
            //check in database
        $host=DB_HOST; // Host name 
        $dbusername=DB_USERNAME; // Mysql username 
        $dbpassword=DB_PASSWORD; // Mysql password 
        $db_name=DB_NAME; // Database name 
        $tbl_name="user"; // Table name 
        

        // Connect to server and select databse.
        mysql_connect("$host", "$dbusername", "$dbpassword")or die("cannot connect"); 
        mysql_select_db("$db_name")or die("cannot select DB");

        // username and password sent from form 
        $myusername=$_POST['myusername']; 
        $mypassword=$_POST['mypassword']; 

        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
        $myusername = mysql_real_escape_string($myusername);
        $mypassword = mysql_real_escape_string($mypassword);
        $sql="SELECT * FROM $tbl_name WHERE name='$myusername' and password='$mypassword'";
        $result=mysql_query($sql);

        // Mysql_num_row is counting table row
        $count=mysql_num_rows($result);
        $row=mysql_fetch_array($result);

        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count==1){
         
        $sql="SELECT * FROM $tbl_name WHERE usrname='$myusername' and password='$mypassword'";
        $result=mysql_query($sql);
        $_SESSION['username'] = $myusername;
        
        $expire=time()+60*60*12;

        header("Location: main.php");
        }else {

      // Login failed: display an error message to the user
          
      //$results['errorMessage'] = "Incorrect username or password. Please try again.";
      header("Location: fail.php");
    }

 
}




?>