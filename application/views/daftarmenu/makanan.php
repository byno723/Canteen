<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Selamat Datang Di CanTeent</h3>
        <!--  SECOND ROW OF PANELS -->

        <div class="container">
            <a href="" class="btn btn-primary mb" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Daftar Menu </a>

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <?php if ($this->session->flashdata('flash')) : ?>
                <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Menu <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
            <?php endif; ?>

        </div>


        <table class="table table-borderless  display nowrap" id="table_id">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Harga </th>

                    <th scope="col">Kategori</th>
                    <th scope="col">Gambar </th>

                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($makanan as $q) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $q['nama_menu']; ?></td>
                        <td>Rp.<?= $q['harga']; ?> </td>
                        <td><?= $q['kategori']; ?></td>
                        <td><img src="<?= base_url('assets/img/makanan/') . $q['gambar']; ?>" alt="" width="50" height="50"></td>

                        <td class="">
                            <a href="<?= base_url(); ?>menu/detailmakanan/<?= $q['id_menu']; ?>" class="label label-primary px-4 py-2"> Edit </a> &nbsp
                            <a href="<?= base_url(); ?>menu/hapusmakanan/<?= $q['id_menu']; ?>" class="label label-danger px-4 py-2"> Hapus </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>


            </tbody>
        </table>



        <!-- /row - SECOND ROW OF PANELS -->
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid mt">
                <h4 class="text-center">Tambah Daftar Menu </h4>
                <?= form_open_multipart('menu/'); ?>
                <div class="form-horizontal style-form">
                    <div class="form-group">
                        <?php $kode = $this->Kode_m->kode() ?>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control round-form" name="id_menu" value="<?= $kode; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="nama_menu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Harga </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="harga">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kategori </label>
                        <div class="col-sm-10">
                            <select class="form-control " name="kategori">

                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-4">
                            <input type="file" class="default" name="berkas" />
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">

                            <button type="submit" class="btn btn-primary btn btn-block">Submit</button>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>