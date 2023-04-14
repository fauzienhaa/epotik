<div style="background:url('../bg2.png');">
<nav class="navbar navbar-expand-md pd-container">
    <a class="navbar-brand" href="index.php?id=<?php echo $row['id']; ?>">
        <img class="img-fluid" src="image/epotik.png">
    </a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#topbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="topbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?id=<?php echo $row['id']; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="obat_user.php?id=<?php echo $row['id']; ?>">Daftar Obat</a>
            </li>
            <li class="nav-item">
                        <a class="nav-link" href="antrean.php?id=<?php echo $row['id']; ?>">Antrean</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="riwayat.php?id=<?php echo $row['id']; ?>">Riwayat</a>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $row['nama'] ?></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="box-navbar dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profil_user.php?id=<?php echo $row['id'] ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
</div>