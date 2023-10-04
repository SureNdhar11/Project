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
    $regno=$_GET['regno'];

    $check="SELECT * FROM marks WHERE regno='$regno'";
    $check_user=mysqli_query($link,$check);
    $info=$check_user->fetch_assoc();

    if(isset($_POST['update']))
    {
        
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $sub1=$_POST['MA8391'];
        $sub2=$_POST['CS8491'];
        $sub3=$_POST['CS8492'];
        $sub4=$_POST['CS8451'];
        $sub5=$_POST['CS8493'];
        $sub6=$_POST['GE8291'];
        $email=$_POST['email'];
        
        $sql="UPDATE marks SET name='$name',pass='$pass',MA8391='$sub1',CS8491='$sub2',CS8492='$sub3',CS8451='$sub4',CS8493='$sub5',GE8291='$sub6',email='$email' WHERE regno='$regno'";
        $result=mysqli_query($link,$sql);
        if($result)
        {
            echo "<script  type='text/javascript'>
              alert('UPDATE Successfully');
        </script>";
        }
        else{
            echo "<script  type='text/javascript'>
              alert('erorr found');
        </script>";
        }

    }

?>
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
<style>
 
label {
    display: inline-block;
    width:100px;

    padding-top: 10px;
    padding-bottom: 10px;
}
#header{
                position:fixed;
                top:0px;
                width: 100%;
            }
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

            @keyframes animateGradient { 
                0%   {background-position: 0 0;}
                50%  {background-position: 0 100%;}
                100% {background-position: 0 0;}
            }

        #header{
            position:fixed;
             width: 100%;
             margin-top:0px;
             
        }

</style>
	</head>

    <body>
        <div id="header">
        <?php
            include 'admin_sidebar.php';
        ?>
        </div>
          
	
           <h1 style="padding-left: 550px;margin-top:90px"><b>UPDATE STUDENT</b></h1><br>
            <div class="container">
            <form action="#" method="POST">
            
            <div style="margin-left:20px;margin-top:10px;font-size:30px"> Student Information </div>

            <div style="margin-left: 55px;">
                <div>
                    <label>Register No:</label>
                    <input class="input" type="number" name="regno"  maxlength="12" value="<?php echo "{$info['regno']}" ?>" required disabled>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Name:</label>
                    <input class="input" type="text" name="name"  maxlength="30" value="<?php echo "{$info['name']}" ?>" required>
                </div>          
                <div>
                    <label>Password:</label>
                    <input class="input"  name="pass" maxlength="20" value="<?php echo "{$info['pass']}" ?>" required>                                      
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Email:</label>
                    <input class="input" type="email" name="email"   value="<?php echo "{$info['email']}" ?>"required>
                </div>
                
            </div>
            <div style="margin-left:20px;margin-top:10px;font-size:30px"> Student's Marks Information </div>
            <h3 style="margin-left: 50px;">Semester 4:</h3>
            <div style="margin-left: 75px;width:100%">
            
                <div>
                    <label>Subject-1:</label>
                    <input class="input" type="number" name="MA8391"   max="20" value="<?php echo "{$info['MA8391']}" ?>" required >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Subject-2:</label>
                    <input class="input" type="number" name="CS8491"   max="20" value="<?php echo "{$info['CS8491']}" ?>"required>
                </div>
                <div>
                    <label>Subject-3:</label>
                    <input class="input" type="number" name="CS8492"   max="20" value="<?php echo "{$info['CS8492']}" ?>"required>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
                    <label>Subject-4:</label>
                    <input class="input" type="number" name="CS8451"   max="20" value="<?php echo "{$info['CS8451']}" ?>"required>
                </div>
                <div>
                    <label>Subject-5:</label>
                    <input class="input" type="number" name="CS8493"   max="20" value="<?php echo "{$info['CS8493']}" ?>"required>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Subject-6:</label>
                    <input class="input" type="number" name="GE8291"   max="20" value="<?php echo "{$info['GE8291']}" ?>" required>
                </div>
            
            </div><br>
            <center>
            <div>      
               <input type="submit" class="btn btn-primary"name="update" value="UPDATE">
            </div>
            </center>    

</html>