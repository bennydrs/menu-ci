<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Mengatur Urutan Menu</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <hr>
    <span>Drag and Drop the table rows and <button class="btn btn-info btn-sm" onclick="window.location.reload()">REFRESH</button></span>
    <a href="<?= base_url('menu'); ?>" class="btn btn-warning btn-sm">Kembali</a>

    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>url</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontents">
                                <?php foreach ($menu as $m) : ?>
                                    <tr class="row1" data-id="<?= $m['id'] ?>">
                                        <td>
                                            <div style="color:rgb(124,77,255); text-align:center; font-size: 20px; cursor: pointer;" title="change display order">
                                                <i class="fa fa-fw fa-grip-lines"></i>
                                            </div>
                                        </td>
                                        <td><?= $m['nama_menu'] ?></td>
                                        <td><?= $m['icon'] ?></td>
                                        <td><?= $m['url'] ?></td>

                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>