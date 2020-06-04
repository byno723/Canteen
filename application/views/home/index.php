<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Selamat Datang Di CanTeent</h3>
        <!--  SECOND ROW OF PANELS -->
        <div class="row">
            <div class="col-md-6 col-sm-6 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                    <div class="green-header">
                        <h5>Pendapatan</h5>
                    </div>
                    <div class="chart mt">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                    </div>
                    <p class="mt"><b>Rp.- <?php foreach ($hari as $q) : ?>
                                <?= number_format($q['pendapatan_hari']); ?>
                            <?php endforeach; ?>
                        </b><br /> / Hari</p>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 mb">
                <div class="darkblue-panel pn">
                    <div class="darkblue-header">
                        <h5>Transaksi</h5>
                    </div>
                    <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                    <footer>
                        <div class="centered">
                            <h5> <?php
                                    $customer = $this->db->count_all('tbl_pembayaran');
                                    echo "$customer";
                                    ?> Transaksi</h5>
                        </div>
                    </footer>
                </div>
                <!--  /darkblue panel -->
            </div>
            <!-- /col-md-6 -->
        </div>
        <!-- /row - SECOND ROW OF PANELS -->
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->