<?php 

function validate_user_input($userInput){
        $userInput = trim($userInput);
        $userInput = stripslashes($userInput);
        $userInput = htmlspecialchars($userInput);
        return $userInput;
    }
    $nameErr = "";
    $name = "";

 if(isset($_POST['calculate']) && $_SERVER['REQUEST_METHOD'] == "POST"):
 	echo $name = validate_user_input($_POST['name']);
 	echo $email = validate_user_input($_POST['email']);
 	echo $cost = validate_user_input($_POST['cost']);
 	echo $rate = validate_user_input($_POST['rate']);
 	echo $amount = validate_user_input($_POST['amount']);
 	 if ($name == ""):
 	   $nameErr = " Enter Your ";
 	       

 	 endif;      

 endif;
?>