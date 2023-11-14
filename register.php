<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["u"];
    $email = $_POST["e"];
    $password = $_POST["p"];
    $password_enc = md5($password);

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    // $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $warn = "Email Already Exists.";
        // echo '<script>alert("' . $warn . '");</script>';
        echo ("<script LANGUAGE='JavaScript'>
             window.alert(' $warn ');
             window.location.href='index.html';
             </script>");

    } else {
        $sql = "INSERT INTO user (name,email,password) VALUES ('$username', '$email', '$password_enc')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $msg = ' Welcome '. $username .'! ,Registration successful';
            // echo "". $msg ."";
            // exit();
        } else {
            $msg = "Error: " . $conn->error;
        }
        // echo '<script>alert("' . $msg . '");</script>';
        echo ("<script LANGUAGE='JavaScript'>
             window.alert(' $msg ');
             window.location.href='index.html';
             </script>");

    }
}
mysqli_close($conn);
exit();
?>