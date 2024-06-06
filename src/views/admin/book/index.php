<?php
Message::flash();
?>
        <div class="container1">
            <div class="main"> 
                <h1>Book</h1>
                <table id="example" class="stripe" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>
                                <div class="tdbtn">
                                    <button onclick="location.href='<?= BASEURL . '/admin/bookinsert' ?>'" type="button" class="tadd"><span class="material-symbols-outlined">library_add</span>New Book</button>
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
                            <td class="tdname"><?= $row['name'] ?></td>
                            <td class="tdname"><?= $row['publisher'] ?></td>
                            <td><?= $row['stock'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td>
                                <img src= "<?= BASEURL . '/public/img/book/' . $row['image'] ?>" alt="<?= $row['name'] ?>" width="60px" height="100px">    
                            </td>
                            <td class="tdbtn">
                                <button class="tupd" onclick="location.href='<?= BASEURL . '/admin/bookedit/' . $row['id_book'] ?>' ">Edit<span class="material-symbols-outlined">edit</span></button>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <div class="cpr">
                    <p style="font-size:24px">&copy; 2024 IntaanLailatul. All rights reserved.</p>
                    <!-- <p><i class="fa fa-instagram" style="font-size:24px"></i> Copyright @aditwchksr :v</p> -->
                </div>
            </div>
        </div>