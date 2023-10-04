<!DOCTYPE html>
<html>
<head>
	<title> YOUR RESULT</title>
	<link rel="stylesheet" a href="styleresult.css">
 
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
        
<body>
    <center>
    <form action="mail_test.php" method="post">
    <a href = "index.php" class="btn btn-danger" style = "float:right;margin-top:10px;margin-right:10px;">LOGOUT</a><br><br><br><br>
                <div class="txt" style="color:aliceblue;"><br><h1>RESULT MANAGEMENT</h1></div> <br><br>   
                    <div class="content">
            <div class="padding" style="padding: 10px; line-height: 37px;">
            <img src= "clglogo.jpeg" width="100" height="115" style = "float:right">


<?php 

session_start(); 
        $_SESSION['regno']=$_POST['regno'];

$link = mysqli_connect('localhost','root','','demo');
if(!$link){
    die('connection error'.mysqli_connect_error());
}

if (isset($_POST['regno']) && isset($_POST['pass'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $regno = validate($_POST['regno']);

    $pass = validate($_POST['pass']);

    if (empty($regno)) {
        

        header("Location: loginstu.php?error=<b>Register Number is required</b>");

        exit();

    }else if(empty($pass)){

        header("Location: loginstu.php?error=Password is required");

        exit();

    }

        $sql = "SELECT * FROM marks WHERE regno='$regno' AND pass='$pass'";

        $result = mysqli_query($link, $sql);
		

        if (mysqli_num_rows($result) === 1) {

            $rows = mysqli_fetch_assoc($result);

            if ($rows['regno'] == $regno && $rows['pass'] == $pass) {

                                      $regno=$rows['regno'];
                                      $name=$rows['name'];
                                      $ma8391=$rows['MA8391'];
                                      $cs8491=$rows['CS8491'];
                                      $cs8492=$rows['CS8492'];
                                      $cs8451=$rows['CS8451'];
                                      $cs8493=$rows['CS8493'];
                                      $ge8291=$rows['GE8291'];
                                         echo "<b><br>REGISTER NUMBER :".$regno. " <br>  ". "NAME :".$name . "<br><br>" . "MA8391 :".$ma8391 . "<br>" . "CS8491 :".$cs8491 . "<br>" . "CS8492 :".$cs8492 . "<br>". "CS8451 :".$cs8451 . "<br>". "CS8493 :" .$cs8493 . "<br>". "GE8261 :" .$ge8291 . "<br><b>";
                              

                

            }else{

                header("Location: loginstu.php?error=Incorect Register Number or Password");

                exit();

            }

        }else{

            header("Location: loginstu.php?error=Incorect Register Number or Password");

            exit();

        }

    }

else{

    header("Location: index.php");

    exit();

}
?>
</div>
            </div>
        </div><br><br>
        
         
</form>      
                </center>
    </body>
</html>