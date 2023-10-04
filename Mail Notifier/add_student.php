<?php

session_start(); 

		function session_register($regno){
			global $$regno;
			$_SESSION[$regno] = $$regno;
			$$regno = &$_SESSION[$regno]; 
		}


$link = mysqli_connect('localhost','root','','demo');
if(!$link){
    die('connection error'.mysqli_connect_error());
}
if(isset($_POST['add_student']))
{
    $regno=$_POST['regno'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $sub1=$_POST['MA8391'];
    $sub2=$_POST['CS8491'];
    $sub3=$_POST['CS8492'];
    $sub4=$_POST['CS8451'];
    $sub5=$_POST['CS8493'];
    $sub6=$_POST['GE8291'];
    $mobileno=$_POST['mobno'];
    $email=$_POST['email'];

    $check="SELECT * FROM marks WHERE regno='$regno'";
    $check_user=mysqli_query($link,$check);
    $row_count=mysqli_num_rows($check_user);
    if($row_count==1)
    {
        echo "<script  type='text/javascript'>
        alert('Register Number Already Exist.Try Another One');
  </script>";
    }
    else{
    $sql="INSERT INTO marks(regno,name,pass,MA8391,CS8491,CS8492,CS8451,CS8493,GE8291,mobno,email) VALUES('$regno','$name','$pass','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$mobileno','$email')";
    $result=mysqli_query($link,$sql);
    if($result)
    {
        echo "<script  type='text/javascript'>
              alert('Data Uploaded Successfully');
        </script>";
    }
    else{
        echo "upload failed";
    }
}
}
?>
<!DO class="input" type html>
<html>
    <head>
    	<meta charset="utf-8">
	    <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="adminhome.css">

	    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <style class="input" type="text/css">
             form{
                padding: 10px;
                margin-left: 150px;
                margin-bottom: 20px;
                margin-top: 10px;
                background: linear-gradient(45deg, #D98EFF,#8ED6FF,#E0FF8E,#FFCF8E);
                background-size: 100% 400%;
                animation:  animateGradient 5s ease-in-out infinite;
                animation-delay: 2s;
                border-radius: 20px;
            }
            label {
                margin-right:10px;
                width: 150px; /* Adjust this value to the desired width of your labels */
                text-align: right;
                padding-right: 10px;
                padding-bottom: 10px;
            }
            #header{
                position:fixed;
                top:0px;
                width: 100%;
            }
            

            @keyframes animateGradient { 
                0%   {background-position: 0 0;}
                50%  {background-position: 0 100%;}
                100% {background-position: 0 0;}
            }

            
            
        </style> 
	</head>

    <body>
        <div id="header">   
            <?php
                include 'admin_sidebar.php';
            ?>
        </div>
        <br><br><br>
        <div>  <br>

            <h1 style="padding-left: 560px;"><b>ADD STUDENT</b></h1>
	        <div class="container" >
            <form action="#" method="POST">
                <br>
                <div style="margin-left:20px;margin-top:-3px;font-size:30px"> Student Information </div>
                <br>
                <div style="margin-left: 55px;">
                    <div>
                        <label>Register Number:</label>
                        <input class="input" type="text" name="regno" maxlength="12" required>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Name:</label>
                        <input class="input" type="text" name="name" maxlength="30" required>
                    </div>          
                    <div>
                        <label>Password:</label>
                        <input class="input" type="password" name="pass" maxlength="20" required>                                      
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Email:</label>
                        <input class="input" type="email" name="email" required>
                    </div>
                </div>
                <div style="margin-left:20px;margin-top:10px;font-size:30px"> Student's Marks Information </div>
                <h3 style="margin-left: 50px;">Semester 4:</h3>
                <div>
                    <div>
                        <label>Subject-1:</label>
                        <input class="input" type="number" name="MA8391" max="20" required >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Subject-2:</label>
                        <input class="input" type="number" name="CS8491"  max="20"required>
                    </div>
                    <div>
                        <label>Subject-3:</label>
                        <input class="input" type="number" name="CS8492"  max="20"required>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Subject-4:</label>
                        <input class="input" type="number" name="CS8451"  max="20"required>
                    </div>  
                    <div>
                        <label>Subject-5:</label>
                        <input class="input" type="number" name="CS8493"  max="20" required>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Subject-6:</label>
                        <input class="input" type="number" name="GE8291"  max="20"required>
                    </div>  
                </div>
                    <br>
                    <center>
                    <div>
                        <input type="submit" class="btn btn-primary"name="add_student" value="ADD">
                    </div>
                    <br>
                </center>
            </form>
    <!--    </div>    -->
        </div>
    </body>
</html>