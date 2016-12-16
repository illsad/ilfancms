<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Posting
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/posts') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/posts/edit/' . $posts['posts_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-2">
                <?php if (!empty($posts['posts_image'])) { ?>
                    <img src="<?php echo upload_url($posts['posts_image']) ?>" class="img-responsive ava-detail">
                <?php } else { ?>
                    <img src="<?php echo base_url('media/image/missing-image.png') ?>" class="img-responsive ava-detail">
                <?php } ?>
            </div>
            <div class="col-md-10">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Judul Posting</td>
                            <td>:</td>
                            <td><?php echo $posts['posts_title'] ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td><?php echo $posts['category_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $posts['posts_is_published'] == 0 ? 'Draft' : 'Terbit' ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal publikasi</td>
                            <td>:</td>
                            <td><?php echo pretty_date($posts['posts_published_date']) ?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><?php echo $posts['user_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>