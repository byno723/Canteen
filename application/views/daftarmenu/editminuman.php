<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Selamat Datang Di CanTeent</h3>

        <div class="row">
            <div class="col-lg-8">
                <form class="form" method="post" action="<?= base_url('menu/editminuman'); ?>" enctype="multipart/form-data">

                    <div class="form-horizontal style-form">
                        <div class="form-group">
                            <div class="col-sm-10">

                                <input type="hidden" name="id_minuman" value="<?= $minuman['id_minuman']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nama minuman</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" value="<?= $minuman['nama_minuman']; ?>" name="nama_minuman">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Harga minuman</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $minuman['harga_minuman']; ?>" class="form-control round-form" name="harga_minuman">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Stok minuman</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="stok_minuman" value="<?= $minuman['stok_minuman']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/minuman/') . $minuman['gambar_minuman']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="berkas">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>

                    </div>
                </form>


            </div>
        </div>
        <!-- /row - SECOND ROW OF PANELS -->
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->