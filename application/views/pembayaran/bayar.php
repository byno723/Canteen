<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Selamat Datang Di CanTeent</h3>

        <div class="card ">

            <h3 class="text-center mt-2">Daftar Customer</h3>
            <table class="table table-borderless" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Nama Pesanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Tanggal Pembayaran</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    $total = 0; ?>
                    <?php foreach ($bayar as $q) :
                        $total = ($q['qty'] * $q['harga']);
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $q['nama_customer']; ?></td>
                            <td> <?= $q['npm_pelanggan']; ?></td>
                            <td>- <?= $q['nama_menu']; ?></td>
                            <td>Rp. <?= number_format($q['harga']); ?></td>
                            <td> <?= $q['qty']; ?></td>

                            <td><?= $q['tgl_pembayaran']; ?></td>
                            <td>Rp.<?= number_format($total); ?></td>

                            <td class=""> <a href="" class="label label-warning"> <?= $q['status']; ?> </a></td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>

    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->