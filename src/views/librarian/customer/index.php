<?php
Message::flash();
?>
        <div class="container1">
            <div class="main"> 
                <h1>Customer</h1>
                <table id="example" class="stripe" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th class="thbtn">
                                <div class="tdbtn">
                                    <button onclick="location.href='<?= BASEURL . '/librarian/customerinsert' ?>'" type="button" class="tadd"><span class="material-symbols-outlined">library_add</span>New Customer</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach($AllCustomer as $row):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="tdname"><?= $row['name'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td class="thbtn">
                                <button class="tupd" onclick="location.href='<?= BASEURL . '/librarian/customeredit/' . $row['id_account'] ?>' ">Edit<span class="material-symbols-outlined">edit</span></button>
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