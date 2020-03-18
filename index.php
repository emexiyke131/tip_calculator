<?php 

function validate_user_input($userInput){
        $userInput = trim($userInput);
        $userInput = stripslashes($userInput);
        $userInput = htmlspecialchars($userInput);
        return $userInput;
    }


    $nameErr = $emailErr = $costErr = $rateErr = "";
    $name = $email = $cost = $rate =  "";
   

 if(isset($_POST['calculate']) && $_SERVER['REQUEST_METHOD'] == "POST"):
 	 $name = validate_user_input($_POST['name']);
 	 $email = validate_user_input($_POST['email']);
 	 $cost = validate_user_input($_POST['cost']);
 	 $rate = validate_user_input($_POST['rate']);
 	 $amount = validate_user_input($_POST['amount']);
 	
 	 if (empty($name)):
 	    $nameErr = "Please Enter Your Name ";
 	 elseif (!preg_match("/^[a-zA-z ]*$/",$name)): 
 	 	$nameErr = "Your name should contain only alphabets";
 	 elseif(empty($email)):
            $emailErr = " Email Cannot be empty";
            
     elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)):
            $emailErr = " Enter a valid email format";

     elseif(empty($cost)):
            $costErr = " Please Enter Total Service Cost";
     elseif(empty($rate)):
            $rateErr = " Please Select Your Service Rate";
     

 	 
 	       
        else:
        	$serviceCost = $rate/100;
        	$tipAmount = $serviceCost * $cost;
        	$amount =$tipAmount;
 	 endif;      

 endif;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tip Calculator</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	
</head>
<body>
	<h1>Tip Calculator </h1>
	<div id="tip">
		<form action="#" method="post">
			<label for="Name">Name:</label>
			<input type="text"  id="name" name="name" value="<?php echo $name?>"><br><span style="color: red; font-size: 14px; padding-left: 250px"><?php echo $nameErr?></span>
			<br>

			<label for="email">Email:</label>
			<input type="text"  id="email" name="email" value="<?php echo $email?>"><br><?php echo $emailErr?>
			<br>

			<label for="tip">Service Cost:</label>
			<input type="number"  id="price" name="cost" value="<?php echo $cost?>">
			<br><?php echo $costErr?>
			<br>

			<label for="rate">Service Performance:</label>
			<select name="rate" id="rate" name="rate" value="<?php echo $rate?>">
			<option value="">Select Service Rate</option>
		 	<option value="20">Excellent</option>
		 	<option value="15">Good</option>
		 	<option value="10">Fair</option>
		 	<option value="5">Poor</option>
			</select><br><?php echo $rateErr?>
			<br>

			<label for="tip">Tip Amount:</label>
			<input type="number" name="amount" id="tipfeild" value="<?php echo $amount ?>" readonly>
			<br><br>

			<button id="showTip" name="calculate">Calculate</button>
		</form>

	</div>

