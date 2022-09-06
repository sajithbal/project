
<?php 
  $server="localhost";
  $username="cse";
  $pwd="cse@123";
  $db="mydb";
  $con=mysqli_connect($server,$username,$pwd,$db);
  if(!$con)
  {
    die("Connection failed due to ".mysqli_connect_error());
  }

  echo "successfully connected";
  $rollno=$_POST['rollno'];
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];

  $sql="INSERT INTO `registration`(`rollno`,`name`,`gender`,`dob`,`email`,`mobile`) VALUES ('$rollno','$name','$gender','$dob','$email','$mobile');";

  if($con->query($sql) == TRUE)
  {
      echo 'successfully inserted';
  }
  else 
  {
      echo "error: $con->error ";
  }

   $con->close();


?>
   