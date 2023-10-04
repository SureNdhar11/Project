<?php
   session_start();
   // $regno=$_SESSION['regno'];

    $link = mysqli_connect('localhost','root','','demo');
    if(!$link){
        die('connection error'.mysqli_connect_error());
    }
    //if($_GET['regno'])
    $regno=$_GET['regno'];

   // $user_id=$_GET['regno'];
    $sql = "SELECT * FROM marks WHERE regno='$regno'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) === 1) {
        $rows = mysqli_fetch_assoc($result);
            //if ($rows['regno'] == $regno && $rows['pass'] == $pass) {
                
                $regno=$rows['regno'];
                $name=$rows['name'];
                $MA8391=$rows['MA8391'];
                $CS8491=$rows['CS8491'];
                $CS8492=$rows['CS8492'];
                $CS8451=$rows['CS8451'];
                $CS8493=$rows['CS8493'];
                $GE8291=$rows['GE8291'];
                $email=$rows['email'];
            //}                    
        }

    $subject = "Result of ".$regno;
    $txt = "Name :".$name. "\n". "MA8391 :".$MA8391 . "\n" . "CS8491 :".$CS8491 . "\n" . "CS8492 :".$CS8492 . "\n". "CS8451 :".$CS8451 . "\n". "CS8493 :" .$CS8493 . "\n". "GE8261 :" .$GE8291 . "\n";
    $headers = "From: surendharloga@gmail.com" . "\r\n" ;
    mail($email,$subject,$txt,$headers);
    echo '<html>
    <head>
        <style>
            svg {
  width: 100px;
  display: block;
  margin: 40px auto 0;
}

.path {
  stroke-dasharray: 1000;
  stroke-dashoffset: 0;
}
.circle {
    -webkit-animation: dash .9s ease-in-out;
    animation: dash .9s ease-in-out;
  }
.line {
    stroke-dashoffset: 1000;
    -webkit-animation: dash .9s .35s ease-in-out forwards;
    animation: dash .9s .35s ease-in-out forwards;
  }
.check {
    stroke-dashoffset: -100;
    -webkit-animation: dash-check .9s .35s ease-in-out forwards;
    animation: dash-check .9s .35s ease-in-out forwards;
  }


p {
  text-align: center;
  margin: 20px 0 60px;
  font-size: 1.25em;
}
.success {
    color:black;
  }
*{
    margin-top: 90px;
}
a{
    color: blue;
}



@-webkit-keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}

@keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}

@-webkit-keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}

@keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}

        </style>
    </head>
    <body>
        
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
            <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
            <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
        </svg>
        <p class="success">Email Sent Successfully!
        <br><br>
        Click here to go <a href="view_student.php">Back</a>
        </p>
        <center></center>
       
           
    </body>
</html>';
?>