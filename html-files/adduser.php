<?php
// Include config file
require_once "inc/dbconn.inc.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
$_SERVER["REQUEST_METHOD"] == "POST";
	$uname = trim($_POST['username']);
	
    // Prepare a select statement
    $sql = "SELECT usrnme FROM Details WHERE usrnme = ?";
        
    $stmt = mysqli_prepare($conn, $sql);
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", htmlspecialchars($uname));            
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // store result
        mysqli_stmt_store_result($stmt);
        // Check if username exists				
        if(mysqli_stmt_num_rows($stmt) == 1){
            $username_err = "This username is already taken.";
			header("location: usertaken.html");
		
        } else{
            $username = trim($uname);
		}
        } else{
               echo "Oops! Something went wrong. Please try again later.";
		}
        // Close statement
        mysqli_stmt_close($stmt);
	
    // Validate password
    
    if(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    // Validate confirm password
    $confirm_password = trim($_POST["confirm_password"]);
        if($password != $confirm_password){
            $confirm_password_err = "Password did not match.";
        }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Details (usrnme, pwd) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $uname, $pword);
            
            // Set parameters
            $uname = $username;
            $pword = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: loginpage.html");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);

?>
 