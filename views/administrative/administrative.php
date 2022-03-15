<?php
    include $_SERVER['DOCUMENT_ROOT'].'/views/includes/header.php';
?>
<body>
<div class="main_content">
    <div class="content">
        <h3>Choose Your Role...</h3>
        <button class="info" onclick="location.href='admin/alogin.php'">Admin</button><br><br>
        <button class="info" onclick="location.href='staff/stafflogin.php'">Staff</button><br><br>
        <button class="info" onclick="location.href='seller/sellerlogin.php'">Seller</button>
    </div>
</div>
</body>
</html>