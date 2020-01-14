<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= uri_string() == '' ? 'active' : '' ?>">
        <a class="nav-link " href="<?= base_url('/'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php
    $queryMenu = "SELECT * FROM menus WHERE is_active = 1 ORDER BY orderby ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <?php foreach ($menu as $m) : ?>
        <!-- submenu -->
        <?php
        $menuId = $m['id'];
        $querySubmenu = "SELECT * FROM submenus WHERE menu_id = '$menuId' AND is_active = 1 ORDER BY id ASC";

        $subMenu = $this->db->query($querySubmenu)->result_array();
        $subMenunum = $this->db->query($querySubmenu)->num_rows();
        ?>

        <?php if ($subMenunum == 0) : ?>
            <li class="nav-item <?php echo uri_string() == $m['url'] ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url($m['url']); ?>">
                    <i class="<?= $m['icon']; ?>"></i>
                    <span><?= $m['nama_menu']; ?></span>
                </a>
            </li>
        <?php else : ?>
            <li class="nav-item <?php foreach ($subMenu as $sm) echo $this->uri->segment(1) == $sm['url'] ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $m['id']; ?>" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="<?= $m['icon']; ?>"></i>
                    <span><?= $m['nama_menu']; ?></span>
                </a>

                <div id="collapse<?= $m['id']; ?>" class="collapse <?php foreach ($subMenu as $sm) echo $this->uri->segment(1) == $sm['url'] ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php foreach ($subMenu as $sm) : ?>
                            <a class="collapse-item <?php echo $this->uri->segment(1) == $sm['url'] ? 'active' : ''; ?>" href="<?= base_url($sm['url']); ?>"> <?= $sm['nama_submenu']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>
            <?php endif; ?>
            </li>

        <?php endforeach; ?>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->