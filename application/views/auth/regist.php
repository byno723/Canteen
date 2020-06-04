 <div class="container-fluid">
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