<?php
$data['title'] = '404';
$this->load->view('template/head', $data);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 p404 centered">
            <img src="<?= base_url('assets/'); ?>vendor/img/404.png" alt="">

            <br>
            <br>
            <a href="<?= base_url('home/'); ?>" class="btn btn-primary"> <b> Back Home </b></a>
        </div>
    </div>
</div>