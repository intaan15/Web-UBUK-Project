<?php
$data = Message::getData();
$username = "";
$password = "";
if($data) {
    $username = $data['username'];
    $password = $data['password'];
}
Message::flash();
?>
       <div class="main">
            <form id="sin" action="<?= BASEURL . '/signinproccess' ?>" method="POST">    
                <h1>Welcome!</h1>
                <div class="forminput">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off" value="<?= $username ?>">
                </div>
                <div class="forminput">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off" value="<?= $password ?>">
                </div>
                <button class="btnsi" type="submit">SIGN IN</button>
                <div class="a">
                    <ul>Don't have an account? <a href="<?= BASEURL . '/signup' ?>">Sign Up</a></ul>
                </div>
            </form>