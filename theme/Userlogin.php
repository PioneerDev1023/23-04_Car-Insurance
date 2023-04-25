<?php
if (isset($_POST['submit'])) {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    // $firstname = $_POST["firstname"];
    // $secondname = $_POST["secondname"];


    $conn = new mysqli("localhost", "root", "");
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    $conn->select_db("finalyeardb");
    // Checking if user details match details stored in database
    $sql = "SELECT * FROM register WHERE Email='" . $Email . "' AND Password='" . $Password."';";
    

     $results = $conn->query($sql);
     if ($results->num_rows == 1) {
        session_start();
        while($row = $results->fetch_assoc()) {
            $_SESSION["RegsiterID"] = $row["RegisterID"];
//            $_SESSION["ADMIN_ID"] = $row["ADMIN_ID"];
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
