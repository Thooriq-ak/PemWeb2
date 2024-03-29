<?php

$user_name = $_POST['user_name'];
$password = $_POST['password'];

?>
<div>
    <h1>You are logged in !</h1>
    <h1>Username : <?php echo $user_name?></h1>
    <h1>Password : <?= $password?></h1>
</div>