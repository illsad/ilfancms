
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Kategori Posting
            <a href="<?php echo site_url('admin/posts/add_category'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th align="center" class="controls" >Nama Kategori</th>
                    </tr>
                </thead>
                <?php
                if (!empty($categories)) {
                    foreach ($categories as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <?php
                                if ($row['category_id'] == 1) {
                                    ;
                                    ?>
                                    <td align="center"><b><p style="float: left;" ><?php echo $row['category_name']; ?></p></b></td>
                                <?php } else { ?>
                                    <td align="center"><b><a style="float: left;" href="<?php echo site_url('admin/posts/category/edit/' . $row['category_id']); ?>" ><?php echo $row['category_name']; ?></a></b></td>
                                <?php } ?>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td >Data Kosong</td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>   
            </table>
            <div class="pagination">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>

