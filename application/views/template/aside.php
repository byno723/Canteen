<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.php"><img src="<?= base_url('assets/'); ?>vendor/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
            <h5 class="centered">User</h5>
            <li class="mt">
                <a class="" href="<?= base_url('home'); ?>">
                    <i class=" fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url('Pemesanan'); ?>">
                    <i class="fa fa-laptop"></i>
                    <span>Pemesanan</span>
                </a>
            </li>



            <li>
                <a href="<?= base_url('pembayaran'); ?>">
                    <i class="fa fa-money"></i>
                    <span>Pembayaran </span>
                    <span class="label label-theme pull-right mail-info">
                        <?php
                        $pembayaran = $this->db->where('status', 'Belum Bayar')->from("tbl_pembayaran")->count_all_results();
                        echo "$pembayaran";
                        ?>
                    </span>
                </a>
            </li>


            <li>
                <a href="<?= base_url('laporan'); ?>">
                    <i class="fa fa-table"></i>
                    <span>Laporan </span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('menu/'); ?>">
                    <i class="fa fa-book"></i>
                    <span>Datar Menu </span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('menu/promo'); ?>">
                    <i class="fa fa-book"></i>
                    <span>Datar Promo </span>
                </a>
            </li>




            <li>
                <a href="<?= base_url('auth/registration'); ?>">
                    <i class="fa fa-user"></i>
                    <span>User </span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->