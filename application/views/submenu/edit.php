<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Tambah Sub Menu</h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('submenu/edit/') . $submenu['id'] ?>" method="post">

                <input type="hidden" id="nama_submenu_lama" name="nama_submenu_lama" value="<?= $submenu['nama_submenu'] ?>">

                <div class="form-group row">
                    <label for="nama_submenu" class="col-sm-2 col-form-label">Nama Sub Menu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_submenu" name="nama_submenu" value="<?= $submenu['nama_submenu'] ?>">
                        <?php echo form_error('nama_submenu', '<small class="text-danger">', '</small>'); ?>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <small class="text-danger"><?= $this->session->flashdata('error'); ?></small>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="menu_id" class="col-sm-2 col-form-label">Parent Menu</label>
                    <div class="col-sm-10">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php
                            $this->db->where('url', '#');
                            $menu = $this->db->get('menus')->result_array();
                            ?>
                            <option value="">Pilih Parent Menu..</option>
                            <?php foreach ($menu as $m) : ?>
                                <?php if ($m['id'] == $submenu['menu_id']) : ?>
                                    <option value="<?= $m['id']; ?>" selected><?= $m['nama_menu']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['nama_menu']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('menu_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon'] ?>">
                        <?php echo form_error('icon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url'] ?>">
                        <?php echo form_error('url', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="aktif" value="1" name="aktif" <?php if ($submenu['is_active'] == 1) echo "checked='checked'" ?>>
                            <label class="custom-control-label" for="aktif">Aktif?</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('submenu') ?>" class="btn btn-warning">Kembali</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


</div>