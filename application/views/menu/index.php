<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Menu</h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <a href="<?= base_url('menu/add'); ?>" class="btn btn-primary mb-3">Tambah</a>
    <a href="<?= base_url('menu/sortMenu'); ?>" class="btn btn-warning mb-3">Atur</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Icon</th>
                            <th scope="col">URL</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $m['nama_menu']; ?></td>
                                <td><?= $m['icon']; ?></td>
                                <td><?= $m['url'] ?></td>
                                <td><?= $m['is_active']; ?></td>
                                <td>
                                    <?php if ($m['id'] != 3) : ?>
                                        <a href="<?= base_url('menu/edit/') . $m['id'] ?>" class="badge badge-success">edit</a>
                                        <a href="<?= base_url('menu/delete/') . $m['id'] ?>" class="badge badge-danger delete">hapus</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->