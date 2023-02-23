        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Beranda</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Master Data
            </div>

            <?php if($title == 'Data Siswa'): ?>
                <li class="nav-item active" id="menu-dashboard"> 
                <a class="nav-link pb-0 " href="<?= base_url('admin/datasiswa'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Data Siswa</span></a>
                </li>
            <?php else: ?>
                <li class="nav-item" id="menu-dashboard"> 
                <a class="nav-link pb-0 " href="<?= base_url('admin/datasiswa'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Data Siswa</span></a>
                </li>
            <?php endif; ?>
                    

            <?php if($title == 'Data Kelas'): ?>
                <li class="nav-item active" id="menu-ras">
                <a class="nav-link pb-0" href="<?= base_url('admin/datakelas'); ?>">
                    <i class="fas fa-book"></i>
                    <span>Data Kelas</span></a>
                </li>
            <?php else: ?>
                <li class="nav-item" id="menu-ras">
                <a class="nav-link pb-0" href="<?= base_url('admin/datakelas'); ?>">
                    <i class="fas fa-book"></i>
                    <span>Data Kelas</span></a>
                </li>

            <?php endif; ?>
            

            

             
       

            <hr class="sidebar-divider mt-3">

            <div class="sidebar-heading">
                Laporan
            </div>

            <?php if($title == 'Laporan Keuangan'): ?>
            <li class="nav-item active" id="menu-dashboard"> 
                <a class="nav-link pb-0" href="<?= base_url('admin/laporankeuangan'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Laporan Keuangan</span></a>
            </li>
            <?php else: ?>
            <li class="nav-item" id="menu-dashboard"> 
                <a class="nav-link pb-0" href="<?= base_url('admin/laporankeuangan'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Laporan Keuangan</span></a>
            </li>
            <?php endif; ?>

        


        

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End  of Sidebar --> 