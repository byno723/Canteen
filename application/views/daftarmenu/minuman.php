<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Selamat Datang Di CanTeent</h3>



        <div class="container">

            <a href="" class="btn btn-primary mb " data-toggle="modal" data-target=".minuman">Tambah Menu Minuman</a>
        </div>

        <table class="table table-borderless  display nowrap" id="table_id">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Minuman</th>
                    <th scope="col">Harga Minuman</th>
                    <th scope="col">Stok Minuman</th>
                    <th scope="col">Status Minuman</th>
                    <th scope="col">Gambar </th>

                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($minuman as $q) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $q['nama_minuman']; ?></td>
                        <td>Rp.<?= $q['harga_minuman']; ?></td>
                        <td><?= $q['stok_minuman']; ?></td>
                        <td><?= $q['status_minuman']; ?></td>
                        <td><img src="<?= base_url('assets/img/minuman/') . $q['gambar_minuman']; ?>" alt="" width="50" height="50"></td>

                        <td class="">
                            <a href="<?= base_url(); ?>menu/detailminuman/<?= $q['id_minuman']; ?>" class="label label-primary px-4 py-2"> Edit </a> &nbsp
                            <a href="<?= base_url(); ?>menu/hapusminuman/<?= $q['id_minuman']; ?>" class="label label-danger px-4 py-2"> Hapus </a>
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




<div class="modal fade minuman" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid mt">
                <h4 class="text-center">Tambah Menu Minuman</h4>
                <?= form_open_multipart('menu/minuman'); ?>

                <div class="form-horizontal style-form">

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Minuman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="id_minuman">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Minuman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="nama_minuman">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Harga Minuman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="harga_minuman">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Stok Minuman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="stok_minuman">
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