<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Selamat Datang Di CanTeent</h3>
        <!--  SECOND ROW OF PANELS -->

        <div class="container">
            <a href="" class="btn btn-primary mb" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data </a>

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
                    <th scope="col">Nama User</th>
                    <th scope="col">Email </th>

                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($user as $q) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $q['nama_user']; ?></td>
                        <td><?= $q['email']; ?></td>

                        <td class="">

                            <a href="<?= base_url(); ?>auth/hapus/<?= $q['id_user']; ?>" class="label label-danger px-4 py-2"> Hapus </a>
                        </td>
                    </tr>

                <?php
                    $i++;
                endforeach; ?>
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
                <h4 class="text-center">Tambah Data </h4>
                <form method="post" action="<?= base_url('auth/registration'); ?>">
                    <div class="form-horizontal style-form">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="nama_user">
                                <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control round-form" name="password1">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" placeholder="Ulangi Password" class="form-control round-form" name="password2">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>




                        <div class="form-group">

                            <div class="col-sm-12">

                                <button type="submit" class="btn btn-primary btn btn-block">Submit</button>

                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>