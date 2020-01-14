<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Tambah Menu</h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('menu/add') ?>" method="post">

                <div class="form-group row">
                    <label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Masukkan nama menu" value="<?= set_value('nama_menu') ?>">
                        <?php echo form_error('nama_menu', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan nama menu" value="<?= set_value('icon') ?>">
                        <?php echo form_error('icon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="aktif" value="1" name="aktif" checked>
                            <label class="custom-control-label" for="aktif">Aktif?</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" data-toggle="collapse" data-target="#collapseExample" id="punya">
                            <label class="custom-control-label" for="punya">Punya URL?</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row collapse" id="collapseExample">
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan url menu" value="#">
                        <small id="url" class="form-text text-muted">
                            menu tidak mempunyai sub menu
                        </small>
                        <?php echo form_error('url', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('menu'); ?>" class="btn btn-warning">Kembali</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


</div>