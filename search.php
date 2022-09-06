<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
      <form action="search.php" method="post">
        <input type="text" name="roll" id="roll"/>
        <input type="submit" name="submit"  value="Search"/>
      </form>
    </div>

    <div class="container">
      <?php
         if(isset($_POST['submit'])) 
         { 
            $roll = $_POST['roll'];
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
            $sql="SELECT * from `registration` WHERE rollno='$roll'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) 
            {
             // output data of each row
             echo "<table bgcolor='#ff00ff' border='1' style='font-size: 25px; width:100%' >";
             echo "<tr>";
             while ($field = mysqli_fetch_field($result)) 
             {
               echo "<th>". $field->name . "</th>";
             }
             echo "</tr>";

             while($row = $result->fetch_assoc()) 
             {
               echo "<tr>" ;
               echo "<td>".$row["rollno"]."</td><td>".$row["name"]."</td><td>".$row["gender"]."</td><td>".$row["dob"]."</td><td>".$row["email"]."</td><td>".$row["mobile"]."</td>";
               echo "</tr>";
             }
             echo "</table>";
            }
            else 
            {
              echo "0 results";
            }

            $con->close();
         }
       ?>
    </div>
    

</body>
</html>
