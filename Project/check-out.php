<!DOCTYPE HTML>
<html>
    <head>
        <title> Check Out  </title>
        <style>
            #column1{
                float: left;
                width: 35%;
                padding-top: 10px;
                padding-left: 30px;
                align-items: center;
                color: aliceblue
            }
            
            #column2{
                float: left;
                width: 50%;
                padding-top: 10px;
                color: aliceblue;
            }
            
            #row{
            
            }
        </style>
    </head>
    <body>
         <?php include('includes/header1.html');?>
         <div class="clearfix";></div>
        <div id="row">
       
      
        <form action="check-out.php" method="post">
             <div id="column1" style="float ">  
                 
             <h3>Details </h3>
             <p><label>First Name: <input type="text" name="firstname" size= "20" maxlength= "60"></label></p>
             <p><label> Last Name: <input type="text" name="lastname" size= "20" maxlength= "60"></label></p>
             <p><label >Email : <input type="text" name="email"></label></p>
             <p> <label>Phone : <input type="text" name="phone"></label></p>
           
          </div>
            
        <div id="column2">
            <h3>PAYMENT DETAILS</h3>
            
            <p><label>Name on Card: <input type="text" name="cardname" size= "20" maxlength= "60" placeholder="Michele Morrone"></label></p>
            <p> Card Number: <input type="text" name="cardnumber" size= "20" maxlength= "23" placeholder="1234-1234-1234-1234"></p>
            <p> Exp month: <input type="text" name="expmonth" size= "20" maxlength= "60" placeholder="October"></p>
            <p> Exp Year: <input type="text" name="expyear" size= "20" maxlength= "60" placeholder="2022"></p>
            <p> <input type = "submit" name= "submit" value="submit"></p>
         </div> 
 
            </form>
            
             
      
         
       </div>
    </body>

</html>


<?php


    require('mysqli_connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
     $errors = []; 
     
    //Details Validation
  
    if(empty($_POST['firstname'])){
        $errors[] = 'You forgot to enter your first name.';
	} else {
		$fn =trim($_POST['firstname']);
	}
    
     if(empty($_POST['lastname'])){
        $errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
	} 
    
    //validating email with REGULAR EXPRESSION
   if(!empty($_POST['email'])) {
       $e = trim($_POST['email']);
       $pattern = "/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/";
       if(preg_match($pattern , $e)){
           $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
       }
       else{
           $errors[] = 'Your Email Address Is not in Correct Format';
       }
   } else{
        $errors[] = 'You forgot to enter your email address.';	
	}
        
   //validating Phone Number with REGULAR EXPRESSION
   if (!empty($_POST['phone'])) {
         $p = trim($_POST['phone']);
         $pattern = "/^(\d{3})(-\d{3})(-\d{4})$/" ;
        if(preg_match($pattern , $p) ){
            $p = mysqli_real_escape_string($dbc, trim($_POST['phone']));
                    
        }else{
            $errors[] =  'Phone number is not valid, it must be 10 digit long and Numberic'; 
        }
	}else {
		$errors[] = 'You forgot to enter your phone number and it must to be numeric values.';
	}
        
    
    // Payment Validation 
    
    if(empty($_POST['cardname'])){
        $errors[] = 'You forgot to enter Name in the Name Field of card .';
	    } else {
		$cn = mysqli_real_escape_string($dbc, trim($_POST['cardname']));	  }   
    
  //validating Card Number with REGULAR EXPRESSION    
      if(!empty($_POST['cardnumber'])){
          $cnum = trim($_POST['cardnumber']);
          $pattern = "/^(\d{4})(-\d{4})(-\d{4})(-\d{4})$/";
           if(preg_match($pattern , $cnum)){
                mysqli_real_escape_string($dbc, trim($_POST['cardnumber']));	  }   
     
           }else{
               $errors[] = 'Your Card Number is not correct ,  please enter in correct format';
           }
      }else{
          $errors[] = 'You forgot to enter your Card Number';
      }
    
        //expire month
    
    if(empty($_POST['expmonth'])){
        $errors[] = 'You forgot to enter the expire Month of your card';
    }else{
        $em = mysqli_real_escape_string($dbc, trim($_POST['expmonth']));
    }
    
     //validating expire year with REGULAR EXPRESSION        
    if(!empty($_POST['expyear'])){
        $ey = trim($_POST['expyear']);
          $pattern = "/^(\d{4})$/";
        
           if(preg_match($pattern , $ey)){
               
               // To compare it with current year
               if($ey <= date("Y")){
                   $errors[] = 'Your Card Exp Year is not valid';
               }
               else{     
                    mysqli_real_escape_string($dbc, trim($_POST['expyear']));	     

               }
               
           }else{
               $errors[] = 'Please Enter the Correct format of your exp year';
           }
      }else{
         $errors[] = 'You forgot to enter the expire Year of your card';
       
    }  
    
       
     if(empty($errors)){
          session_start();
        echo $_SESSION["id"];
        if($_SESSION["login"]== "true"){
         $q = "INSERT INTO customer VALUES (DEFAULT, '$fn', '$ln', '$e', '$p','$cn', '$cnum', '$em', '$ey' )";
          $r = @mysqli_query($dbc, $q); 
          if($r){
                    echo "entry done to the database";
                }

                else{
                    echo "error ! while uploading data .";
                }
    }
         else{
             
             echo "Session Time Out ";
              header("Location: http://localhost/Project/index.php");
             
         }
        
         
         
     }
    else { // Report the errors.

		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p>';
    
	
}
?>


