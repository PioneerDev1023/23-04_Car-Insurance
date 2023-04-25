<?php
 if(isset($_POST['submit'])) {
     $firstname = $_POST['firstname'];
     $secondname = $_POST['secondname'];
     $email = $_POST['email'];
     $password = $_POST['password'];

    // Create connection
    $conn = new mysqli("localhost", "root", "");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
   
    // Check connection
   
    $conn->select_db("finalyeardb");

    $sql = "INSERT INTO register (firstname, secondname, email, password)
     VALUES ('$firstname', '$secondname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
         //add header here
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;     }
$conn->close();
echo "<a href='../theme/index.html'>Click Login Page to Back</a>";
}
?>