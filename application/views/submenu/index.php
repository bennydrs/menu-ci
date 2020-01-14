<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Sub Menu</h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <a href="<?= base_url('submenu/add'); ?>" class="btn btn-primary mb-3">Tambah</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Submenu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Sub Menu</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Icon</th>
                            <th scope="col">URL</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($subMenu as $sm) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $sm['nama_submenu']; ?></td>
                                <td><?= $sm['nama_menu']; ?></td>
                                <td><?= $sm['icon']; ?></td>
                                <td>
                                    <?php if ($sm['url'] == null) {
                                        echo '#';
                                    }
                                    echo $sm['url'];
                                    ?>
                                </td>
                                <td><?= $sm['is_active'] ?></td>
                                <td>
                                    <?php if ($sm['id'] != 3 && $sm['id'] != 4) : ?>
                                        <a href="<?= base_url('submenu/edit/') . $sm['id'] ?>" class="badge badge-success">edit</a>
                                        <a href="<?= base_url('submenu/delete/') . $sm['id'] ?>" class="badge badge-danger delete">hapus</a>
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