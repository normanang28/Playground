<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
  <?php  if(session()->get('id')>0) { ?>
        <li><a href="<?= base_url('/Dashboard')?>" class="ai-icon" aria-expanded="false">
                <i class="fa-solid fa-house-lock" title="Dashboard"></i>
                <span  class="nav-text">Dashboard</span>
            </a>
        </li>
  <?php }else{} ?>
  <?php  if(session()->get('level')== 1) { ?>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="fa-solid fa-chalkboard-user" title="User"></i>
            <span class="nav-text">User</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="<?= base_url('/Data_Pegawai')?>">Data Pegawai</a></li>
        </ul>
        </li>
  <?php }else{} ?>
  <?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="fa-solid fa-hands-holding-child" title="Playground"></i>
            <span class="nav-text">Playground</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="<?= base_url('/Playground/list_permainan')?>">List Permainan</a></li>
            <li><a href="<?= base_url('/Playground/pembelian_tiket')?>">Pembelian Tiket</a></li>
  <?php  if(session()->get('level')== 1) { ?>
            <li><a href="<?= base_url('/Playground/pembelian_barang')?>">Pembelian Barang</a></li>
  <?php }else{} ?>
        </ul>
        </li>
  <?php }else{} ?>
  <?php  if(session()->get('level')== 1) { ?>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="fa-solid fa-laptop-file" title="Laporan"></i>
            <span class="nav-text">Laporan</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="<?= base_url('/Laporan/laporan_income')?>">Laporan Income</a></li>
            <li><a href="<?= base_url('/Laporan/laporan_pengeluaran')?>">Laporan Pengeluaran</a></li>
        </ul>
        </li>
  <?php }else{} ?>
        <hr class="sidebar-divider">
  <?php  if(session()->get('id')>0) { ?>
        <li><a href="<?= base_url('/My_Account')?>" class="ai-icon" aria-expanded="false">
            <i class="fa-solid fa-user-secret" title="My Account"></i>
            <span class="nav-text">My Account</span>
        </a>
        </li>
  <?php }else{} ?>
        <li><a href="<?= base_url('/Home/logout')?>" class="ai-icon" aria-expanded="false">
            <i class="fa-solid fa-right-from-bracket" title="Log Out"></i>
            <span class="nav-text">Log Out</span>
        </a>
        </li>
        </ul>
    </div>
</div>

<div class="content-body">
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 align-items-start">
        <div class="me-auto d-none d-lg-block">
            <?php
            $level = session()->get('level'); 
            $nama_pegawai = session()->get('nama_pegawai');

            $userLevelText = "";

            if ($level == 1) {
                $userLevelText = "Super Admin";
            } elseif ($level == 2) {
                $userLevelText = "Petugas Playground";
            } else {
                $userLevelText = "";
            }

            $namaToShow = $nama_pegawai ? $nama_pegawai : "";

            echo "<p class='mb-0 text-capitalize'>Welcome <b>$namaToShow - $userLevelText</b> to Playground" . session()->get('nama_website') . "!</p>";
            ?>
        </div>
        <b><span id="currentDateTime"></span></b>
    </div>


    <script>
        function updateDateTime() {
            const dateTimeElement = document.getElementById('currentDateTime');
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: '2-digit',
                second: '2-digit',
                hour12: true, 
            };

            const currentDateTime = new Date().toLocaleString(undefined, options);
            dateTimeElement.textContent = currentDateTime.replace(',', ' at');
        }

        setInterval(updateDateTime, 1000);

        updateDateTime();
    </script>


