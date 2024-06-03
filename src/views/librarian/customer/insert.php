<?php
$data = Message::getData();
$name = "";
$username = "";
$password = "";
$phone = "";
if($data) {
    $name = $data['name'];
    $username = $data['username'];
    $password = $data['password'];
    $phone = $data['phone'];
}
Message::flash();
?>
        <div class="main">
            <form action="<?= BASEURL . '/librarian/customerinsertproccess' ?>" method="post">
                <h1>Add Customer</h1>
                <div class="forminput">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" autocomplete="off" value="<?= $name ?>">
                </div>
                <div class="forminput">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off" value="<?= $username ?>">
                </div>
                <div class="forminput">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off" value="<?= $password ?>">
                </div>
                <div class="forminput">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone" autocomplete="off" value="<?= $phone ?>">
                </div>
                <div class="btnn">
                    <button onclick="location.href='<?= BASEURL . '/librarian/customer' ?>'" type="button" class="btnsi">Cancel</button>
                    <button type="submit" class="btnsi">Submit</button>
                </div>
            </form>
        </div>