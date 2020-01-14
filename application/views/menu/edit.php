<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Ubah Menu</h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('menu/edit/') . $menu['id'] ?>" method="post">

                <input type="hidden" id="nama_menu_lama" name="nama_menu_lama" value="<?= $menu['nama_menu'] ?>">

                <div class="form-group row">
                    <label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="<?= $menu['nama_menu'] ?>">
                        <?php echo form_error('nama_menu', '<small class="text-danger pl-3">', '</small>'); ?>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <small class="text-danger"><?= $this->session->flashdata('error'); ?></small>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $menu['icon'] ?>">
                        <?php echo form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="aktif" value="1" name="aktif" <?php if ($menu['is_active'] == 1) echo "checked='checked'" ?>>
                            <label class="custom-control-label" for="aktif">Aktif?</label>
                        </div>
                    </div>
                </div>

                <?php
                // cek apakah menu mempunyai submenu
                $this->db->select('submenus.*, menus.nama_menu');
                $this->db->join('menus', 'menus.id = submenus.menu_id');
                $this->db->where('submenus.menu_id', $menu['id']);
                $query = $this->db->get('submenus');
                $cek = $query->row_array();

                ?>

                <?php if ($cek == null) : ?>

                    <div class="form-group row">
                        <label for="punya" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" data-toggle="collapse" data-target="#collapseExample" id="punya" <?php if ($menu['url'] != '') echo "checked='checked'" ?>>
                                <label class="custom-control-label" for="punya">Punya URL?</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row collapse <?php if ($menu['url'] != '') echo 'show' ?>" id="collapseExample">
                        <label for="url" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url" name="url" value="<?= $menu['url'] ?>" <?php if ($cek != null) echo 'required' ?>>
                            <small id="url" class="form-text text-muted">
                                menu tidak mempunyai sub menu
                            </small>
                            <?php echo form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                <?php endif; ?>

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