<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $email = $_POST["e"];
    $password = $_POST["p"];
    $org_password = md5($password);
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$org_password' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row["name"];
        // $msg =  "Welcome, $username! Login successful!";
        $msg = ' Welcome '.$username.' ! Login successful!';
      
    } else {
        $msg =  "Invalid email or password.";
        echo '<script>alert("' . $msg . '");</script>';
        
    }
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('$msg');
    window.location.href='index.html';
    </script>");
    exit();
}
mysqli_close($conn);
exit();
?>