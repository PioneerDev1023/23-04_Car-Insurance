<?php
if (isset($_POST['submit'])) {
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("finalyeardb");
    // Checking if user details match details stored in database


    $sql = "SELECT * FROM admintable WHERE Email='" . $Email . "' AND Password='" . $Password."';";
    
     $results = $conn->query($sql);
     if ($results->num_rows == 1) {
        session_start();
        while($row = $results->fetch_assoc()) {
        $_SESSION["ADMIN_ID"] = $row["ADMIN_ID"];
        }
        header("Location:../theme/index.html");
        die();
        
    }else{
        echo "<h3>No such Email account</h3>";
        echo "<h3>Or wrong Email and Password</h3>";
        echo "<h3>Please try Again</h3>";

        echo "<a href='../theme/index.html'>Click Login Page to Back</a>";

    }
    $conn->close();
}else{
    header("../Loginpage/loginpage.php");
    die();
}
?>
   // $sql = "SELECT * FROM usertable WHERE Email='" . $Email . "' AND Password='" . $Password . "'AND Username='" . $Username . "';";

    // $results = $conn->query($sql);
    // if ($results->num_rows ==1) {
    //     // output data of each row
    //     while ($row = $result->fetch_assoc()) {
    //         echo $row;

    //     }

    

        echo "succ";
        die();
        // Message to tell user details are incorrect, redirect user to homepage
    } else {
        echo "<h3>No such Email account</h3>";
        echo "<h3>Or wrong Email and Password</h3>";
        echo "<h3>Please try Again</h3>";



    }


?>