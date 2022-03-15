<?php
include $_SERVER['DOCUMENT_ROOT'] .'/views/includes/header.php';

$data["error"] = [];
$flag = "";
$name = $email = $phone = $address ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $data["error"]["name"] = "<br>Name not found!";
    } else {
        $name = $_POST["name"];
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["phone"])) {
        $phone = $_POST["phone"];
    }

    if (isset($_POST["address"])) {
        $address = $_POST["address"];
    }
    if (empty($_POST["password"])) {
        $data["error"]["password"] = "<br>Password can not be empty!";
    }
    else {
        $password = $_POST["password"];
        if (empty($_POST["con-password"])){
            $data["error"]["con-password"] = "<br>Please re-enter your password!";
        }
        else{
            if($_POST["password"]!==$_POST["con-password"]){
                $data["error"]["con-password"] = "<br>Password not matched";
            }
        }
    }
    if (empty($name) || empty($email) || empty($password)) {
        $flag = "<br>Registration Failed.";
    }
    else {
        $user =
            $name ."|".
            $email."|".
            $phone."|".
            $address."|".
            $password."|";

        $file = fopen('info.txt', 'a');
        fwrite($file, $user);
        $flag = "<br>Registration Success.";
    }
}
?>

<div class="main_content">
    <div class="content">
        <div class="form">
            <p>Staff Registration</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="text" name="name" placeholder="Enter your name">
                <span><?=isset($data['error']['name'])? $data['error']['name']:null;?></span>
                <br>
                <input type="email" name="email" placeholder="Enter your email" required>
                <br>
                <input type="text" name="phone" placeholder="0123456789" >
                <br>
                <input type="text" name="address" placeholder="Enter Address" >
                <br>
                <input type="password" name="password" placeholder="Enter password">
                <span><?=isset($data['error']['password'])? $data['error']['password']:null;?></span>
                <br>
                <input type="password" name="con-password" placeholder="Enter password">
                <span><?=isset($data['error']['con-password'])? $data['error']['con-password']:null;?></span>
                <br>
                <input class="btn-login" type="submit" value="REGISTER">
                <span><?=isset($flag)? $flag:null;?></span>
                <br><br>
                <a href="stafflogin.php">Back to login</a>
            </form>
        </div>
    </div>
</div>