
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?id_admin=<?php echo $row['id_admin'] ?>">
    <!-- <div class="sidebar-brand-icon">
        <img class="img-fluid" src="../image/epotik2.png" width="60%" height="60%" ></img>
    </div> -->
    <div class="sidebar-brand-text mx-3">Menu</div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="index.php?id_admin=<?php echo $row['id_admin'] ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="obat_admin.php?id_admin=<?php echo $row['id_admin'] ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Obat</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="antrean_admin.php?id_admin=<?php echo $row['id_admin'] ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Antrean</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="laporan_admin.php?id_admin=<?php echo $row['id_admin'] ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Laporan</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>