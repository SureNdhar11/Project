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
$sql="SELECT * FROM marks";
$result=mysqli_query($link,$sql)
?>
<!DOCTYPE html>
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
</head>
<style type="text/css">
      .table_th{
        margin-left:30px;
        padding:10px;
        font-size: 20px;
      }
     
      .table_td{
        margin-left:90px;
        padding: 10px;
        background:skyblue;
      }
      p{
        color: white;
	    background-color: red;
        padding: 5px;
      }
      b{
	padding: 10px 16px;
	border: none;
	background-color: #27ae60;
	color: #fff;
}
      #header{
            position:fixed;
             width: 100%;
             margin-top:0px;
             
        }

    </style> 

    <body>
        <div id="header">
<?php
     include 'admin_sidebar.php';
     ?>
     </div>
     <br>
     <br><br>
     <form action="#" method="POST">
     <center>
     <div class="content">
        <h1>STUDENT DATA</h1>
        <table border='2px' style="padding:50px;">
            <tr>
                <th class="table_th">Regno</th>
                <th class="table_th">Name</th>
                <!--<th class="table_th">Password</th>-->
                <th class="table_th">MA8391</th>
                <th class="table_th">CS8491</th>
                <th class="table_th">CS8492</th>
                <th class="table_th">CS8451</th>
                <th class="table_th">CS8493</th>
                <th class="table_th">GE8291</th>
                <!--<th class="table_th">Mobile_no</th>-->
                <th class="table_th"><center>UPDATE</center></th>
                <th class="table_th"><center>DELETE</center></th>
                <th class="table_th"><center>SEND</center></th>
                <!--<th class="table_th">Email</th>-->
</tr>
<?php
    while($info=$result->fetch_assoc())
    {
?>
<tr>
    <td class="table_td">
        <?php echo "{$info['regno']}";?>
    </td>
    <td class="table_td"><?php echo "{$info['name']}";?></td>
    <!--<td class="table_td"><?php echo "{$info['pass']}";?></td>-->
    <td class="table_td"><?php echo "{$info['MA8391']}";?></td>
    <td class="table_td"><?php echo "{$info['CS8491']}";?></td>
    <td class="table_td"><?php echo "{$info['CS8492']}";?></td>
    <td class="table_td"><?php echo "{$info['CS8451']}";?></td>
    <td class="table_td"><?php echo "{$info['CS8493']}";?></td>
    <td class="table_td"><?php echo "{$info['GE8291']}";?></td>
    <!--<td class="table_td"><?php echo "{$info['mobno']}";?></td>
    <!--<td class="table_td"><?php echo "{$info['email']}";?></td>-->
   
    <td class="table_td"><?php echo "<a class='btn btn-primary' href='update_student.php?regno={$info['regno']}'>UPDATE</a>";?></td>
    <td class="table_td"><?php echo "<a class='btn btn-danger' href='delete.php?regno={$info['regno']}'>DELETE</a>";?></td>
    <td class="table_td"><?php echo "<a  href='mail_test.php?regno={$info['regno']}'><b>SEND</b></a>";?></td>

    </tr>
    <?php
    }
    ?>
</table>
</center>
</form>
</body>
</html>