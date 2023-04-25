<?php
session_start();
if (isset($_POST['login'])) {
    $_SESSION["studentEmail"] = $_POST["email"];
    $Email=$_POST["email"];
    $Password=$_POST["password"];
    $conn = new mysqli("localhost", "root", "", "finalyeardb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("finalyeardb");
    // Checking if user details match details stored in database
    $sql = "SELECT * FROM usertable WHERE Email='".$Email."' AND Password='".$Password."';";
    echo $sql;
    $reports = $conn->query($sql);
    if ($reports->num_rows == 1) {
        session_start();
        while($row = $reports->fetch_assoc()) {
            $_SESSION["UserID"] = $row["UserID"];
//            $_SESSION["ADMIN_ID"] = $row["ADMIN_ID"];
        }
        header("Location:../../studentpage/Frontend/ADD-STUDENT-PROJECTS.php");
        die();
        // Message to tell user details are incorrect, redirect user to homepage
    }else{
        echo "<h3>No such Email account</h3>";
        echo "<h3>Or wrong Email and Password</h3>";
        echo "<h3>Please try Again</h3>";

        echo "<a href='../web/index.html'>Click Login Page to Back</a>";

    }
    $conn->close();
}else{
    header("../../studentpage/Frontend/ADD-STUDENT-PROJECTS.php");
    die();
}
?>
