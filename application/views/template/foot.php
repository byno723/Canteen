<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets/'); ?>vendor/lib/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/lib/bootstrap/js/bootstrap.min.js"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="<?= base_url('assets/'); ?>vendor/text/javascript" src="lib/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("<?= base_url('assets/vendor/img/login-bg.jpg'); ?>", {
        speed: 500
    });
</script>
</body>

</html>