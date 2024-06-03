        <div class="container1">
            <div class="main"> 
                <h1>Book</h1>
                <table id="example" class="stripe" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>
                                <div class="tdbtn">
                                    <button onclick="location.href='<?= BASEURL . '/customer/librarianinsert' ?>'" type="button" class="tadd"><span class="material-symbols-outlined">shopping_cart</span>Order Now</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach($AllBook as $row):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="tdname"><?= $row['name_book'] ?></td>
                            <td><?= $row['stock'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td>
                                <img src= "<?= BASEURL . '/public/img/' . $row['image'] ?>" alt="<?= $row['name_book'] ?>" width="60px" height="100px">    
                            </td>
                            <td class="thbtn">
                                <div class="tdorder">
                                    <button class="btnmin minus-btn"><span class="material-symbols-outlined">remove</span></button>
                                    <input type="text" class="quantity-input" value="0">
                                    <button class="btnplus plus-btn"><span class="material-symbols-outlined">add</span></button>
                                </div>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <div class="cpr">
                    <p><i class="fa fa-instagram" style="font-size:24px"></i> Copyright @aditwchksr :v</p>
                </div>
            </div>
        </div>