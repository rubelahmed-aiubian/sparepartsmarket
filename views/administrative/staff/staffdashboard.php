<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/views/includes/header.php';

if($_SESSION['loggedin']){
    $file = fopen('info.txt', 'r');
    $user = fgets($file);
    $info = explode('|', $user);

    $name = $info[1];
    $email = $info[2];
    $phone = $info[3];
    $address = $info[4];
}
else{
    header('Location:stafflogin.php');
}
?>
<div class="main_content">
    <div class="info-content">
        <h3>Staff Dashboard</h3>
        <p>
            <?php echo
                "Name: " .$name."<br>".
                "Email: " .$email."<br>".
                "Phone: " .$phone."<br>".
                "Adrress: " .$address."<br>";
            ?>
        </p>
        <button class="info" onclick="location.href='stafflogout.php'">LOGOUT</button>
    </div>
</div>

