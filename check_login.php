<?php

$username = $_POST['username'];
$password = $_POST['password'];
//echo "username = $username <br>";
//echo "password = $password";

if ($username == "" || $password == "") {
    echo "<script>
            alert('กรุณากรอกค่าว่าง username หรือ password');
            location.href='login.php';
        </script>";
} else {

    require 'connect.php';

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $con->query($sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($num == 0) {
        echo "<script>
                    alert('username or password invalid');
                    location.href='login.php';
            </script>";
    } else {
        $_SESSION['username'] = $row['username'];
        $_SESSION['fullname'] = $row['fullname'];

        header('location:dist/');
    }
}
