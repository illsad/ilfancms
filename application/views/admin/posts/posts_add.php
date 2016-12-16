<?php $this->load->view('admin/upload'); ?>
<?php $this->load->view('admin/editor'); ?>
<?php $this->load->view('admin/datepicker'); ?>
<?php $this->load->view('admin/posts/add_js'); ?>

<?php
if (isset($posts)) {
    $inputPublishValue = $posts['posts_published_date'];
    $inputJudulValue = $posts['posts_title'];
    $inputRingkasanValue = $posts['posts_description'];
    $inputStatus = $posts['posts_is_published'];
    $inputCategory = $posts['posts_category_category_id'];
} else {
    $inputPublishValue = set_value('posts_published_date');
    $inputJudulValue = set_value('posts_title');
    $inputRingkasanValue = set_value('posts_description');
    $inputStatus = set_value('posts_is_published');
    $inputCategory = set_value('category_id');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($posts)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Posting</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($posts)): ?>
                    <input type="hidden" name="posts_id" value="<?php echo $posts['posts_id']; ?>" />
                <?php endif; ?>
                <label >Judul Posting *</label>
                <input name="posts_title" placeholder="Judul Posting" type="text" class="form-control" value="<?php echo $inputJudulValue; ?>"><br>
                <label >Deskripsi Posting *</label>
                <textarea name="posts_description" rows="10" class="mce-init"><?php echo $inputRingkasanValue; ?></textarea><br />
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
                <div class="form-group">
                    <div class="box4">
                        <label for="image">Unggah File Gambar</label>
                        <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="fa fa-upload"></i> Upload</a>
                        <div style="display: none;" ><a href="" id="opentiny">Open</a></div>

                        <?php if (isset($posts) AND !empty($posts['posts_image'])): ?>
                            <div class="thumbnail mt10">
                                <img class="previewTarget" src="<?php echo $posts['posts_image']; ?>" style="width: 280px !important" >
                            </div>
                            <input type="hidden" name="inputGambarCurrent" value="<?php echo $posts['posts_image']; ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <label>Status Publikasi</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="posts_is_published" value="0" <?php echo ($inputStatus == 0) ? 'checked' : ''; ?>> Draft
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="posts_is_published" value="1" <?php echo ($inputStatus == 1) ? 'checked' : ''; ?>> Terbit
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="inputPublish">Tanggal Publikasi </label>
                        <input id="inputPublish" placeholder="Tanggal Publikasi" name="posts_published_date" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputPublishValue; ?>">
                    </div>
                </div>
                <hr>
                <div class="form-group" ng-controller="CategoriesCtrl">
                    <label>Kategori</label>
                    <div class=" input-group">
                        <select name="category_id" class="form-control" style="position:initial;" id="selectCat">
                            <option ng-repeat="category in categories" ng-selected="category_data.index == category.category_id" value="{{category.category_id}}">{{category.category_name}}</option>
                        </select>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#category" aria-expanded="false">
                                <span class="fa fa-plus"></span>
                            </button>
                        </div>
                    </div>
                    <div class="collapse" id="category">
                        <div class="input-group">
                            <input class="form-control" placeholder="Tambah Baru" id="appendedInputButton" type="text" ng-model="categoryText">
                            <div class="input-group-btn">
                                <button class="btn btn-default simpan" type="button" ng-click="addCategory()" ng-disabled="!(!!categoryText)">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/posts'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($posts)): ?>
                        <a href="<?php echo site_url('admin/posts/delete/' . $posts['posts_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($posts)): ?>
    <!-- Delete Confirmation -->
    <div class="modal fade" id="confirm-del">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><b><span class="fa fa-warning"></span> Konfirmasi Penghapusan</b></h4>
                </div>
                <div class="modal-body">
                    <p>Data yang dipilih akan dihapus oleh sistem, apakah anda yakin?;</p>
                </div>
                <?php echo form_open('admin/posts/delete/' . $posts['posts_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $posts['posts_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $posts['posts_title'] ?>" />
                    <button type="submit" class="btn btn-danger"> Ya</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php if ($this->session->flashdata('delete')) { ?>
        <script type="text/javascript">
            $(window).load(function() {
                $('#confirm-del').modal('show');
            });
        </script>
    <?php }
    ?>
<?php endif; ?>