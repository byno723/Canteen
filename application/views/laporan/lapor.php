<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Laporan Keuangan</h3>


        <table class="table display nowrap " id="table_id">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Total Pendapatan /Tahun</th>

                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($laporan as $q) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td>Rp <?= number_format($q['pendapatan_tahun']); ?>,- / Tahun : <b><?= $q['tahun']; ?></b></td>

                        <td class=""> <a href="<?= base_url(); ?>Laporan/cetak/<?= $q['tahun']; ?>" class=" label label-success px-4 py-2"> Print </a></td>
                    </tr>

                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>



    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->