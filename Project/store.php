!DOCTYPE html>
<html>
<head>
   <style>
        
       
    </style>

</head>
<body>
    <?php include('includes/header1.html');?>
    <div class="clearfix";></div>
     <?php
    
    
    require('mysqli_connect.php');
    
   $q = "SELECT * FROM bookinventory";
   $r = @mysqli_query($dbc, $q);
    
    
   while($row = mysqli_fetch_array($r , MYSQLI_ASSOC)){
        //<a href="check_out.php? $_GET['BookId']">Product 1</a>
       echo "<strong>Book name </strong>:"."<a href= check-out.php> ".$row['Book_Name']."<a>"."<br>";
       echo "<strong>Author Name </strong>: " .$row['Book_Author']."<br>";
       echo "<strong>Published Date </strong>: " .$row['Published_Date']."<br>";
       echo "<strong>Media Type </strong>: " .$row['Media_Type']."<br>";
       echo "<strong>Pages </strong>: " .$row['Pages']."<br>";
       echo "<strong>Quantity </strong>: " .$row['Quantity']."<br><br><br><br>";
       
       
       
       
       
       
     
       
   }
   session_start();
  function click(){
              
             
             $_SESSION["id"] = $row['BookId'];
           
            $_SESSION["login"] = "true";
            header("Location: http://localhost/Project/check-out.php");
           
       }
     
?>
</body>
</html>



