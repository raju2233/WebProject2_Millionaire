
<?php


    session_start();
    error_reporting(E_ALL ^ E_WARNING);

    function check_user($name,$password){
        $contents = file_get_contents("signup_creds.txt");
        $exploded_values = explode("\n",$contents);
        
        $entire_data_array = array(); 

        foreach ($exploded_values as $line) {
            $values = explode(",", $line); 
            $entire_data_array[] = $values; 
        }


        
        foreach ($entire_data_array as $arr){
 
            if(count($arr) > 1){
                if(trim($arr[0]) == trim($name)){

                    if(trim($arr[5]) == trim($password)){
                        return true;
                    }
    
                }
            }

        }
        return false;

        

    }
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $password = $_POST["password"];

        $checking_user = check_user($name,$password);

        if($checking_user){
            $_SESSION['userdata']['name'] = $name;
            $_SESSION['userdata']['password'] = $password;
            header("Location:game_index.php"); 

        } else{
				echo "<h1 style='color:white;font-size:large;margin-left:36%;'>Invalid User Details, please try again!</h1>";
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Treasure Trivia</title>
        <link rel="stylesheet" href="signup_style.css">
        <link rel="icon" type="image/x-icon" href="img/logo.png">

    </head>

    <body>
	
        <form method="post" action="" >
        <fieldset>
            <legend>Player Login:</legend>
            <div class="field">
                        <label class="left">
                                Name:
                        </label>
                        <div class="column">
                            <input type="text" name="name" id="name" size="16" required>
                        </div>
            </div> <br><br>
            <div class="field">
                    <label class="left">
                            Password:
                    </label>
                    <div class="column">
                        <input type="password" name="password" id="password" size="16" required>
                    </div>
            </div><br><br>
            <input type="submit" value="Login" name="submit"> <br><br>
            Not a user? <a href="signup.php">Click Here to Signup!</a>

        </fieldset>
        </form>
    </body>
</html>    