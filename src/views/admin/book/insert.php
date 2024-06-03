<?php
Message::flash();
?>
        <div class="main">
            <form action="<?= BASEURL . 'admin/bookinsertproccess' ?>" method="post">
                <h1>Add Book</h1>
                <div class="forminput">
                    <label for="newname">Name</label>
                    <input type="text" id="newname" name="newname" placeholder="Enter name" autocomplete="off">
                </div>
                <div class="forminput">
                    <label for="stock">Stock</label>
                    <input type="text" id="stock" name="stock" placeholder="Enter stock" autocomplete="off">
                </div>
                <div class="forminput">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" placeholder="Enter price" autocomplete="off">
                </div>
                <div class="forminputimg">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" placeholder="asdasd" autocomplete="off">
                </div>
                <div class="btnn">
                    <button onclick="location.href='<?= BASEURL . '/admin/book' ?>'" type="button" class="btnsi">Cancel</button>
                    <button type="submit" class="btnsi">Submit</button>
                </div>
            </form>
        </div>