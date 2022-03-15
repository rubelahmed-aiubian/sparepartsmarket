<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/views/includes/header.php';
    $flag = 0;

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if($email != NULL && $password != NULL){

            $file = fopen('info.txt', 'r');
            $user = fgets($file);
            $info = explode('|', $user);
            if (trim($info[1]) == $email && trim($info[4]) == $password){
                $_SESSION['loggedin'] = true;
                $cookie_name = "email";
                $cookie_value = $email;
                setcookie($cookie_name,$cookie_value, time() + 300, '/');
                header('Location:bdashboard.php');
                }
                else{
                    $flag++;
                }

            }
            fclose($file);
    }
?>

<div class="main_content">
    <div class="content">
        <div class="form">
            <p>Buyer Login</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="email" name="email" placeholder="Enter your email" required>
                <br>
                <input type="password" name="password" placeholder="Enter password" required>
                <br>
                <input class="btn-login" type="submit" value="LOGIN">
                <span><?php if($flag>0){echo "<br> Login Failed.";}?></span>
                <br><br>
                <a href="bregister.php">Don't have any account?</a><br>
                <a href="/index.php">Go Back To Home?</a>

            </form>
        </div>
    </div>
</div>
