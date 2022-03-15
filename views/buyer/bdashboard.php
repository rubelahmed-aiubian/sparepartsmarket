<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/views/includes/header.php';
    $id = $_SESSION['id'];
    if($_SESSION['loggedin']){
    $file = fopen('info.txt', 'r');
    $user = fgets($file);
    $info = explode('|', $user);

    $name = $info[$id - 1];
    $email = $info[$id];
    $phone = $info[$id+1];
    $address = $info[$id+2];
    }
    else{
        header('Location:blogin.php');
    }
?>
<div class="main_content">
    <div class="info-content">
        <h3>Buyer Dashboard</h3>

        <p>
            <?php echo
                "Name: " .$name."<br>".
                "Email: " .$email."<br>".
                "Phone: " .$phone."<br>".
                "Adrress: " .$address."<br>";
            ?>
        </p>
        <button class="info" onclick="location.href='blogout.php'">LOGOUT</button>
    </div>
</div>

