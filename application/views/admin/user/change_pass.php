<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php echo form_open(current_url()); ?>
        <?php echo validation_errors(); ?>
        <div class="form-group">
            <?php if ($this->uri->segment(3) == 'cpw') { ?>
                <label >Password lama *</label>
                <input type="password" name="user_current_password" class="form-control" placeholder="Password lama">
            <?php } ?>
        </div>
        <div class="form-group">
            <label >Password baru*</label>
            <input type="password" name="user_password" class="form-control" placeholder="Password baru">
            <?php if ($this->uri->segment(3) == 'cpw') { ?>
                <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" >
            <?php } else { ?>
                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>" >
            <?php } ?>
        </div>
        <div class="form-group">
            <label > Konfirmasi password baru*</label>
            <input type="password" name="passconf" class="form-control" placeholder="Konfirmasi password baru" >
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
        <a href="<?php echo site_url('admin/user'); ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Batal</a>
        <?php form_close() ?>
    </div>
</div>