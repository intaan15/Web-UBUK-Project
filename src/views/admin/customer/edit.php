<?php
$data = Message::getData();
if($data) {
    $account['name'] = $data['name'];
    $account['username'] = $data['username'];
    $account['password'] = $data['password'];
    $account['phone'] = $data['phone'];
}
Message::flash();
?>
        <div class="main">
            <form id="form" action="<?= BASEURL . '/admin/customereditproccess' ?>" method="post">
                <input type="hidden" name="id" value="<?= $account['id_account'] ?>">
                <input type="hidden" name="mode" id="mode" value="update">
                <h1>Edit Customer</h1>
                <div class="forminput">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" autocomplete="off" value="<?= $account['name'] ?>">
                </div>
                <div class="forminput">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off" value="<?= $account['username'] ?>">
                </div>
                <div class="forminput">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off">
                </div>
                <div class="forminput">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone" autocomplete="off" value="<?= $account['phone'] ?>">
                </div>
                <div class="btnn">
                    <button onclick="location.href='<?= BASEURL . '/admin/customer' ?>'" type="button" class="btnsi">Cancel</button>
                    <button class="btnsi" onclick="edit('delete')" type="button">Delete</button>
                    <button class="btnsi" onclick="edit('update')" type="button">Edit</button>
                </div>
            </form>
        </div>