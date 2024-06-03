<?php
$data = Message::getData();
if($data) {
    $book['name_book'] = $data['name_book'];
    $book['stock'] = $data['stock'];
    $book['price'] = $data['price'];
    $book['image'] = $data['image'];
}
Message::flash();
?>
        <div class="main">
            <form id="form" action="<?= BASEURL . '/admin/bookeditproccess' ?>" method="post">
                <input type="hidden" name="id" value="<?= $account['id_book'] ?>">
                <input type="hidden" name="mode" id="mode" value="update">
                <h1>Edit Book</h1>
                <div class="forminput">
                    <label for="bookname">Name</label>
                    <input type="text" id="bookname" name="bookname" placeholder="Enter name" autocomplete="off" value="<?= $book['name_book'] ?>">
                </div>
                <div class="forminput">
                    <label for="stock">Stock</label>
                    <input type="text" id="stock" name="stock" placeholder="Enter stock" autocomplete="off" value="<?= $book['stock'] ?>">
                </div>
                <div class="forminput">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" placeholder="Enter price" autocomplete="off" value="<?= $book['price'] ?>">
                </div>
                <div class="forminputimg">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" placeholder="asdasd" autocomplete="off">
                </div>
                <div class="btnn">
                    <button onclick="location.href='<?= BASEURL . '/admin/book' ?>'" type="button" class="btnsi">Cancel</button>
                    <button class="btnsi" onclick="edit('delete')" type="button">Delete</button>
                    <button class="btnsi" onclick="edit('update')" type="button">Edit</button>
                </div>
            </form>
        </div>