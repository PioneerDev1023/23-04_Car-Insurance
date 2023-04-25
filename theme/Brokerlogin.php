<?php
if (isset($_POST['submit'])) {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
  
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("finalyeardb");
    $sql = "SELECT * FROM brokertable WHERE Email='".$Email. "' AND Password='".$Password."';";


     $results = $conn->query($sql);
     if ($results->num_rows == 1) {
        session_start();
        while($row = $results->fetch_assoc()) {
            $_SESSION["BrokerID"] = $row["BrokerID"];
//            $_SESSION["ADMIN_ID"] = $row["ADMIN_ID"];
        }
        header("Location:../theme/index.html");
        die();
        // echo "<h3> WORKING Email account</h3>";
        // Message to tell user details are incorrect, redirect user to homepage
    }else{
        echo "<h3>No such Email account</h3>";
        echo "<h3>wrong Email and Password</h3>";
        echo "<h3>Please try Again</h3>";
        echo "<a href='../theme/index.html'>Click Login Page to Back</a>";

    }
    $conn->close();
}else{
    header("../Loginpage/loginpage.php");
    die();
}
?>
