<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Pengguna
            <a href="<?php echo site_url('admin/user/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3><br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="gradient">
                    <tr>
                        <th>Nama Singkat</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                if (!empty($user)) {
                    foreach ($user as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['user_name']; ?></td>
                                <td ><?php echo $row['user_full_name']; ?></td>
                                <td ><?php echo $row['user_email']; ?></td>
                                <td ><?php echo $row['role_name']; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/user/detail/' . $row['user_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/user/edit/' . $row['user_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php if ($this->session->userdata('user_id') != $row['user_id']) { ?>
                                        <a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/user/rpw/' . $row['user_id']); ?>" ><span class="glyphicon glyphicon-lock"></span> Reset Password</a>
                                    <?php } else {
                                        ?>
                                        <a class = "btn btn-primary btn-xs" href = "<?php echo site_url('admin/profile/cpw/'); ?>" ><span class = "glyphicon glyphicon-repeat"></span> Ubah Password</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td colspan="5" align="center"><?php echo $this->lang->line('data_empty') ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>   
            </table>
        </div>
        <div >
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>