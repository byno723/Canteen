<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <!--CUSTOM CHART START -->
                <div class="border-head">
                    <h3>USER VISITS</h3>
                </div>



                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb">
                        <!-- Extra large modal -->
                        <a href="" data-toggle="modal" data-target=".makanan">

                            <div class=" product-panel-2 pn">

                                <img src="<?= base_url('assets/vendor/'); ?>img/product.jpg" width="200" alt="">
                                <h5 class="mt">Makanan</h5>
                                <h6>TOTAL Menu Makanan: 1388</h6>

                            </div>

                        </a>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 mb">
                        <a href="" data-toggle="modal" data-target=".minuman">

                            <div class="product-panel-2 pn">

                                <img src="<?= base_url('assets/vendor/'); ?>img/product.jpg" width="200" alt="">
                                <h5 class="mt">Minuman</h5>
                                <h6>TOTAL SALES: 1388</h6>

                            </div>
                        </a>

                    </div>
                    <!-- /col-md-6 -->



                </div>
                <!-- /row -->

                <div class="container-fluid">


                    <h3>Pesanan</h3>

                    <?php
                    //cek data belanjaan ada atau tidak
                    $keranjang =    $this->cart->contents();

                    ?>
                    <?php if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('Sukses');
                        echo '</div>';
                    } ?>
                    <form action="<?= base_url('pembayaran'); ?>" method="post">
                        <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <!-- <th scope="col">Gambar</th> -->
                                    <th></th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">NPM</th>
                                    <th scope="col">Nama Pesanan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Sub total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Bayar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($keranjang)) {
                                    $i = 0;
                                    ?>
                                    <li class="header-cart-item">
                                        <p class="alert alert-danger">PESANAN KOSONG</p>
                                    </li>

                                <?php

                                } else { ?>


                                    <?php
                                        $total = $this->cart->format_number($this->cart->total());
                                        //tampilkan data belanja
                                        $i = 1;
                                        foreach ($keranjang as $keranjang) {

                                            //gambar
                                            // $id_makanan = $keranjang['id'];
                                            // $makanan = $this->Makanan_model->getMakananById($id_makanan);
                                            ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <!-- <td><img src="<?= base_url('assets/img/makanan/' . $makanan['gambar']); ?>" alt="" width="50" height="50"></td> -->
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="<?= $keranjang['rowid']; ?>" name="pilih<?= $i; ?>">
                                                    </label>
                                                </div>
                                            </td>
                                            <th scope="row"><?= $keranjang['nama_pelanggan']; ?></th>
                                            <td> - <?= $keranjang['npm']; ?></td>
                                            <td><?= $keranjang['name']; ?></td>
                                            <td>Rp.<?= number_format($keranjang['price']); ?>-</td>
                                            <td><?= $keranjang['qty']; ?></td>
                                            <td><?= $keranjang['id']; ?></td>
                                            <td>Rp. <?= $keranjang['qty'] * $keranjang['price']; ?></td>
                                            <td><a href="<?= base_url('Pemesanan/edit/' . $keranjang['rowid']); ?>"><?= $keranjang['status']; ?></a></td>
                                            <td>

                                                <input type="hidden" value="<?= $keranjang['rowid']; ?>" name="rowid<?= $i; ?>">
                                                <input type="hidden" name="id_menu<?= $i; ?>" value="<?= $keranjang['id_menu']; ?>">
                                                <input type="hidden" name="nama_customer<?= $i; ?>" value="<?= $keranjang['nama_pelanggan']; ?>">
                                                <input type="hidden" name="npm_pelanggan<?= $i; ?>" value="<?= $keranjang['npm']; ?>">
                                                <input type="hidden" name="qty<?= $i; ?>" value="<?= $keranjang['qty']; ?>">




                                                <a href="<?= base_url('Pemesanan/hapus/' . $keranjang['rowid']); ?>" class="label label-danger">Hapus</a>&nbsp;
                                            </td>
                                            <td></td>
                                        <?php
                                                $i++;
                                            } //tutup foreach
                                            if ($i != 0) {
                                                ?>
                                            <input type="hidden" name="banyak" value="<?= ($i - 1); ?>">
                                        </tr>
                                    <?php
                                        }
                                        ?>
                                    <button type="submit" class="btn mb-4 btn-danger btn-block">Pembayaran</button>


                                <?php
                                } //tutup if
                                ?>
                            </tbody>

                        </table>
                    </form>
                    <a href="<?= base_url('pemesanan/hapus'); ?>" class="btn btn-danger float-right">Hapus Semua</a>
                </div>
            </div>


        </div>
        <!-- /col-lg-9 END SECTION MIDDLE -->
        <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
        <!-- /col-lg-3 -->






        <!-- /row -->
    </section>

</section>
<!--main content end-->


<!--makanan-->

<div class="modal fade makanan " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <h1 class="text-center">Daftar Menu Makanan</h1>

                <div class="row">
                    <?php
                    echo form_open(base_url('pemesanan/pesan'));

                    $no = 10000;
                    foreach ($makanan as $q) { ?>


                        <div class="col-md-3 ">

                            <div class="card " style="width: 17rem;height:38rem;margin-right:500px">
                                <img src=" <?= base_url('assets/img/makanan/') . $q['gambar']; ?>" height="100px" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $q['nama_menu']; ?></h5>
                                    <p class="card-text">Rp. <?= $q['harga']; ?></p>
                                    <input type='hidden' value="<?= $q['id_menu']; ?>" name="id_menu<?= $no; ?>">
                                    <input type='hidden' value="<?= $q['harga']; ?>" name="price<?= $no; ?>">
                                    <input type='hidden' value="<?= $q['nama_menu']; ?>" name="name<?= $no; ?>">

                                    <div class="form-group">
                                        <input type="text" name="nama_pelanggan<?= $no; ?>" placeholder="Nama Pelanggan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="npm<?= $no; ?>" placeholder="NPM" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="qty<?= $no; ?>" class="form-control">
                                    </div>

                                    <button type="submit" value="submit" name="pilih1" class="btn btn-block btn-primary">Add to cart</button>

                                </div>
                            </div>
                        </div>
                    <?php

                        $no++;
                    } ?>

                    <input type='hidden' value='<?= ($no - 1); ?>' name='banyak'>
                    <?php
                    form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>


</div>



<!--minuman -->

<div class="modal fade minuman" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <h1 class="text-center">Daftar Menu Minuman</h1>
                <div class="row">
                    <?php
                    echo form_open(base_url('pemesanan/pesan'));
                    $no = 1;
                    foreach ($minuman as $q) { ?>

                        <div class="col-md-3 ">

                            <div class="card" style="width: 17rem;height:38rem">
                                <img src=" <?= base_url('assets/img/makanan/') . $q['gambar']; ?>" height="100px" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $q['nama_menu']; ?></h5>
                                    <p class="card-text">Rp. <?= $q['harga']; ?></p>
                                    <input type='hidden' value="<?= $q['id_menu']; ?>" name="id_menu<?= $no; ?>">
                                    <input type='hidden' value="<?= $q['harga']; ?>" name="price<?= $no; ?>">
                                    <input type='hidden' value="<?= $q['nama_menu']; ?>" name="name<?= $no; ?>">

                                    <div class="form-group">
                                        <input type="text" name="nama_pelanggan<?= $no; ?>" placeholder="Nama Pelanggan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="npm<?= $no; ?>" placeholder="NPM" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="qty<?= $no; ?>" class="form-control">
                                    </div>

                                    <button type="submit" value="submit" name="pilih2" class="btn btn-block btn-primary">Add to cart</button>

                                </div>
                            </div>
                        </div>
                    <?php
                        $no++;
                    } ?>

                    <input type='hidden' value='<?= ($no - 1); ?>' name='banyakk'>
                    <?php

                    form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>